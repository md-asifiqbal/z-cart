<?php

namespace App\Http\Controllers\Storefront\Auth;

use Auth;
use App\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\Customer\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\Auth\SendVerificationEmail as EmailVerificationNotification;
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
    protected $redirectTo = '/customer/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('verify');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
            'agree' => 'required',
             'otp' => 'required|min:5|max:5'
        ]);
    }

      public function sendOtp(Request $request)
    {
         $fieldType = filter_var($request->mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
         $check=Customer::where($fieldType,$request->mobile)->count();
         if($check > 0)
           return response()->json(['email'=>"Email or Mobile no Already Used"],503);
        
        
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
   public function register(Request $request)
    {
     
        if(Auth::guard('web')->check()) {
            return redirect()->back()->with('error', trans('messages.loogedin_as_admin'));
        }

        $this->validator($request->all())->validate();
         $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
         
        if($request->otp){
                $check=\App\OTP::where('mobile',$request->email)->where('otp',$request->otp)->first();
                if(!isset($check)){
                    

                    return response()->json(['otp'=>"OTP doesn't Match !!!"],404);
                }else{
                if(strtotime(now())-strtotime($check->created_at) > 120 ){


                     return response()->json(['otp'=>"OTP Validate time over. Resend Again !!!"],404);
                }
                }
            }
           
            
         $customer =new Customer();
         $customer->name=$request->input('name');
          $customer->verification_token = Null;
         if($fieldType == 'mobile')
            $customer->mobile=$request->input('email');
        else
            $customer->email= $request->input('email');
            
         $customer->password = bcrypt($request->input('password'));
          $customer->save();
            
        

 

        $this->guard('customer')->login($customer);

         return response('loggedin Successfully',200);
    }

    /**
     * Verify the User the given token.
     *
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function verify($token = null)
    {
        if(!$token){
            $customer = Auth::guard('customer')->user();

            $customer->verification_token = Str::random(40);

            if($customer->save()){
                $customer->notify(new EmailVerificationNotification($customer));

                return redirect()->back()->with('success', trans('auth.verification_link_sent'));
            }

            return redirect()->back()->with('success', trans('auth.verification_link_sent'));
        }

        try{
            $customer = Customer::where('verification_token', $token)->firstOrFail();

            $customer->verification_token = Null;

            if($customer->save())
                return redirect()->route('account', 'dashboard')->with('success', trans('auth.verification_successful'));

        } catch(\Exception $e){
            return redirect()->route('account', 'dashboard')->with('error', trans('auth.verification_failed'));
        }
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $customer
     * @return mixed
     */
    protected function registered(Request $request, $customer)
    {
        //
    }
}
