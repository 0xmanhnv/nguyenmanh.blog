<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';



    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * overi
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {   
        if(!Auth::guard('admin')->check()){
            return view('admin.auth.login');
        }else{
            return redirect()->back();
        }
    }

    /*
     * overi
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // dd($this->guard());
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }

    /**
     * Override 
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }


    /**
     * Override
     * credentials
     * @return array $data
     */
    protected function credentials(Request $request)
    {
        $data = $request->all();
        
        // đúng là email thì cho đăng nhập bằng email
        // là username thì đăng nhập bằng username
        if(filter_var($data['username'], FILTER_VALIDATE_EMAIL)){
            $data['email'] = $data['username'];
            unset($data['username']);
        }
        $data['status'] = 1; // admin

        unset($data['_token']);
        return $data;
    }
}
