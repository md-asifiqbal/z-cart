<?php

namespace App\Http\Controllers\Storefront\Auth;

use Auth;
use Password;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Events\Customer\PasswordUpdated;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Mail\VerifyEmail;
use Mail;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest:customer');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function broker()
    {
        return Password::broker('customers');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $email = null)
    {
        return view('auth.passwords.reset')->with(
            ['email' => $email]
        );
    }

    /**
     * Reset the given customer's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $customer
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($customer, $password)
    {
        $customer->password = Hash::make($password);

        $customer->setRememberToken(Str::random(60));

        $customer->save();

        event(new PasswordUpdated($customer));

        $this->guard('customer')->login($customer);
    }
  
   public function resetCustomPass(Request $request){
  
 
     
   }
  
       public function sendOtp(Request $request)
    {
         $fieldType = filter_var($request->mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
         $check=\App\Customer::where($fieldType,$request->mobile)->count();
         if($check == 0)
           return response()->json(['email'=>"User Not Found."],404);
        
        
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
}
