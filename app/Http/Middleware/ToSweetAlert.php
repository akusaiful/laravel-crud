<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class ini untuk support ToSweetAlert middleware dlam vendor realrashed
 * Tak tahu kenapa dia x letak has('error') samada lupa atau buat2 lupa hahaha
 * jadi untuk class error berfungsi, kelas middleware ni perlu digunakan
 * kalau realrashid vendor x digunakan remove class ni dari app\Http\Kernel.php
 */
class ToSweetAlert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // extend class 
        // to handle error alert
        if ($request->session()->has('error')) {
            alert()->error($request->session()->get('error'));
        }

        return $next($request);
    }
}
