<?php namespace App\Http\Controllers\Auth;

use App\Commands\RegisterNewUserCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Contracts\Auth\Guard;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    /**
     * @var Guard
     */
    protected $auth;


    /**
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'getLogout']);
    }


    /**
     * Register untuk mahasiswa
     * @return \Illuminate\View\View
     */
    public function getRegisterMahasiswa() {
        return view('auth.register-mahasiswa');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function getRegisterDosen() {
        return view('auth.register-dosen');
    }


    /**
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postRegister(RegistrationRequest $request) {
        $user = $this->dispatch(new RegisterNewUserCommand($request->all()));
        $this->auth->login($user);

        return redirect(route('home'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function getLogin() {
        return view('auth.login');
    }


    /**
     * @param LoginRequest $request
     * @return array
     */
    public function postLogin(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended(route('home'));
        }

        return redirect('auth/login')->withInput()->withErrors([
            'email' => 'Username atau email salah'
        ]);
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout() {
        $this->auth->logout();

        return redirect('/');
    }

}
