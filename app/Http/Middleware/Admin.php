<?php

namespace App\Http\Middleware;
use Alert;
use Closure;

class Admin
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
        $user = \Auth::user();
        if ($user->rol_id == 1) {
            return $next($request);
        } else {
            Alert::error('Acceso denegado', 'No tienes permisos para ver esta ruta');
            return redirect()->to('home');
        }
    }
}
