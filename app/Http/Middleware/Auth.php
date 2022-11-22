<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $username = session('username');
        $token = session('token_klien');
        $verify = $this->verifyTokenKlien($username, $token);
        if( $verify ){
            return $next($request);
        }

        return redirect('login');
    }

    public function verifyTokenKlien($username, $token){

        $res = Http::asForm()->post( getUrl() . '/klien/check', [
            'username' => $username,
            'token' => $token,
        ] );

        $dres = json_decode($res->getBody()->getContents());

        if ( $dres->code !== 200 ){
            session()->flush();
            return false;
        }else{
            return true;
        }

    }
}
