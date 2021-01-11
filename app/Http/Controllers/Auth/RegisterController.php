<?php

namespace App\Http\Controllers\Auth;

use DB;
use Log;
use Auth;
use App\User;
use App\System;
use Illuminate\Support\Str;
use App\Jobs\SubscribeShopToNewPlan;
use App\Events\Shop\ShopCreated;
use App\Jobs\CreateShopForMerchant;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Validations\RegisterMerchantRequest;
use App\Notifications\Auth\SendVerificationEmail as EmailVerificationNotification;
use App\Notifications\SuperAdmin\VerdorRegistered as VerdorRegisteredNotification;
use Illuminate\Http\Request;
use App\Mail\VerifyEmail;
use Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('verify');
    }

    /**
     * Show the application registration form.
     *
     * @param  str  $plan subscription plan
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($plan = Null)
    {
        return view('auth.register', compact('plan'));
    }

      public function sendOtp(Request $request)
    {
        
        
         $fieldType = filter_var($request->mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
         $check=User::where($fieldType,$request->mobile)->count();
         if($check > 0)
           return response()->json(['email'=>"Email or Mobile no Already Used"],422);
        
        
        $otp=mt_rand(10000,99999);
        $data=\App\OTP::create([
            'mobile' => $request->mobile,
            'otp'=>$otp
        ]);
       
		if($fieldType == 'mobile'){
        $status= $this->send_sms($request->mobile,$otp);

         return 'OTP send to your mobile';
        }else{
             Mail::to($request->mobile)->send(new VerifyEmail($data));
            return 'OTP send to your email';
        }
    }

     public function send_sms($mobile,$otp) {
      $url = "http://premium.mdlsms.com/smsapi";
      $msg="Your OTP is ".$otp." .Please,don't share with anyone.";
      $data = [
        "api_key" => "C20006315fca5e1a5edbd4.21877943",
        "type" => "text",
        "contacts" => $mobile,
        "senderid" => "8809612441118",
        "msg" => $msg
      ];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      curl_close($ch);
      return $response;
    }
  
    public function register(RegisterMerchantRequest $request)
    {
         
          
         
      
        // Start transaction!
        DB::beginTransaction();

        try {
          
            $fieldType = filter_var($request['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
         
        if($request->otp){
            
          
                $check=\App\OTP::where('mobile',$request['email'])->where('otp',$request['otp'])->first();
                if(!isset($check)){
                    

                   $error = new MessageBag();
                    $error->add('errors',"OTP doesn't Match !!!");

                    return redirect()->route('register')->withErrors($error)->withInput();
                }else{
                if(strtotime(now())-strtotime($check->created_at) > 120 ){


                  
                  $error = new MessageBag();
                    $error->add('errors',"OTP Validate time over. Resend Again !!!");

                    return redirect()->route('register')->withErrors($error)->withInput();
                }
                }
            }
          
         
              
            $merchant = new User();
             $merchant->password =  bcrypt($request['password']);
              $merchant->verification_token = NULL;
                $merchant->email_verified_at = now();
              
             
                  if($fieldType == 'mobile')
            $merchant->mobile=$request->input('email');
        else
            $merchant->email= $request->input('email');
                
			$merchant->save();


             $delete=\App\OTP::where('mobile',$request->email)->delete();
			          
            CreateShopForMerchant::dispatch($merchant, $request->all());

            //Auth::guard()->login($merchant);

           
            
        } catch(\Exception $e){

            // rollback the transaction and log the error
            DB::rollback();
            Log::error('Vendor Registration Failed: ' . $e->getMessage());

            // Set error messages:
            $error = new MessageBag();
            $error->add('errors', trans('responses.vendor_config_failed'));

            return redirect()->route('register')->withErrors($error)->withInput();
        }
      
        

        // Everything is fine. Now commit the transaction
        DB::commit();
      
      
       $plan=\App\SubscriptionPlan::where('plan_id',$request->plan)->first();
      
       $sum=0;
    $p='';
       if(isset($plan) && isset($request->periods)){
      $sum=$plan->cost * $request->periods;
      $p="Pay ".$sum." TK for Plan ".$plan->name." for ".$request->periods." Months";
    }
     
        if($plan->cost == "0.00"){
           Auth::guard()->login($merchant);
         
          // Trigger after registration events
        $this->triggerAfterEvents($merchant);
      
       

        // Send notification to Admin
        if(config('system_settings.notify_when_vendor_registered')){
            $system = System::orderBy('id', 'asc')->first();
            $system->superAdmin()->notify(new VerdorRegisteredNotification($merchant));
        }
	   
        return $this->registered($request, $merchant) ?: redirect($this->redirectPath());
        }else{
         
             return view('auth.bkash', compact('merchant','p'));
         
        }
          
      
      
       
      
    
      

       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $fieldType = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
         
        if($request->otp){
                $check=\App\OTP::where('mobile',$data['email'])->where('otp',$data['otp'])->first();
                if(!isset($check)){
                    

                    return response()->json(['otp'=>"OTP doesn't Match !!!"],404);
                }else{
                if(strtotime(now())-strtotime($check->created_at) > 120 ){


                     return response()->json(['otp'=>"OTP Validate time over. Resend Again !!!"],404);
                }
                }
            }
      
        return User::create([
            $fieldType => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_token' => NULL,
            
        ]);
    }

    /**
     * Trigger some events after a valid registration.
     *
     * @param  User  $merchant
     * @return void
     */
    protected function triggerAfterEvents(User $merchant)
    {
        // Trigger the systems default event
        event(new Registered($merchant));

        // Trigger shop created event
        event(new ShopCreated($merchant->owns));

        return;
    }

    /**
     * Verify the User the given token.
     *
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function verify($token = null)
    {
        if(! $token){
            $user = Auth::user();

            $user->verification_token = Str::random(40);

            if($user->save()){
                $user->notify(new EmailVerificationNotification($user));

                return redirect()->back()->with('success', trans('auth.verification_link_sent'));
            }

            return redirect()->back()->with('success', trans('auth.verification_link_sent'));
        }

        $user = User::where('verification_token', $token)->firstOrFail();

        $user->verification_token = Null;

        if($user->save()) {
            return redirect()->route('admin.admin.dashboard')->with('success', trans('auth.verification_successful'));
        }

        return redirect()->route('admin.admin.dashboard')->with('error', trans('auth.verification_failed'));
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered($request, $user)
    {
        
    }

    protected function submitBkash(Request $request)
    {
      
         $user = User::where('shop_id',$request->id)->first();
         $user->bkash=$request->bkash;
        $user->txtid=$request->txtid;
      $user->save();
      
      // Trigger after registration events
        $this->triggerAfterEvents($user);
      
       

        // Send notification to Admin
        if(config('system_settings.notify_when_vendor_registered')){
            $system = System::orderBy('id', 'asc')->first();
            $system->superAdmin()->notify(new VerdorRegisteredNotification($user));
        }
      
        Auth::guard()->login($user);
      
        return redirect($this->redirectPath());
    }
}
