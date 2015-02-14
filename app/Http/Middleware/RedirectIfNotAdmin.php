<?php namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Guard;

class RedirectIfNotAdmin {

    /**
     * @var Guard
     */
    private $auth;


    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next) {
        if ( ! $this->auth->user()->hasRole('Administrator')) {
            return redirect(route('home'));
        }

        return $next($request);
    }

}
