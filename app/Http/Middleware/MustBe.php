<?php

namespace App\Http\Middleware;

use BadMethodCallException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBe
{

    public static $redirectTo = null;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param string $role
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if( $role == null ){
            throw new BadMethodCallException("must be middleware must have one arg");
        }

        if( !in_array($role, array('owner', 'admin')) ){
            throw new BadMethodCallException("must be middleware accept only two args (owner, admin)");
        }

        if( auth()->user()->role != $role ){
            return redirect()->to($this->redirectTo());
        }

        return $next($request);
    }


    public function redirectTo(){
        if( self::$redirectTo != null ){
            return self::$redirectTo;
        }

        return route('dashboard');
    }
}
