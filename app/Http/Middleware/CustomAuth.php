<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');
        if (!$token || !$this->isValidToken($token)) {
            return response()->json('Please enter valid type');
        }


        return $next($request);
    }

    private function isValidToken($token)
    {
        try {
            $decrypted = Crypt::decryptString($token);
            $decrypted = explode('M2Print', $decrypted);
            $result = User::where('User_email', $decrypted[0])
                ->where('User_matricula', $decrypted[1])
                ->first();
            return !!$result;
        } catch (\Exception $e) {
            return false;
        }

        return $next($request);
    }
}