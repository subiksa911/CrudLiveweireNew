<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EnsureUserRoleAllowedAccess
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
        try{
            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();

            // echo 'UserRole: '.$userRole. '</br>';
            // echo 'Curreny Router Name: ' .$currentRouteName. '</br>';

            if (in_array($currentRouteName, $this->userAccessRole()[$userRole]))
            {
                return $next($request);
            }
            else
            {
                abort(403,"Unauthorized action");
            }
        } catch(\Throwable $th){
            abort(403,"Kamu Tidak Di Izinkan Mengakses Halaman Ini");
        }

        // echo 'The Middleware For Access Role Run Everytime a Http Request made.<br/>';


        return $next($request);
    }

    public function userAccessRole()
    {
        return[
            'dosen' =>['dashboard','dosen'],
            'mahasiswa'=>['dashboard','mahasiswa','system'],
        ];
    }
}