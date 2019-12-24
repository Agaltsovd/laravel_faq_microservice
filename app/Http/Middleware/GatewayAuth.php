<?php

namespace App\Http\Middleware;

use App\Exceptions\Gateway\ValidationErrorException;
use Closure;

class GatewayAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @throws ValidationErrorException
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->headers->has('X-User')) {
            throw new ValidationErrorException('Пользователь обязателен');
        }

        $user = $request->header('X-User');

        if (!is_numeric($user)) {
            throw new ValidationErrorException('Пользователь передан не верно');
        }

        $request->query->add(['user_id' => $user]);
        return $next($request);
    }
}
