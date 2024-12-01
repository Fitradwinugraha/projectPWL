<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerified
{
    public function handle($request, Closure $next)
    {
        // Jika user adalah admin, lewati verifikasi
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Untuk user biasa, jalankan logika verifikasi email
        if (!$request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
            !$request->user()->hasVerifiedEmail())) {
            return Redirect::route('verification.notice');
        }

        return $next($request);
    }

}