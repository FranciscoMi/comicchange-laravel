<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Obtenemos el usuario autenticado actualmente
        $user = $request->user();

        // verificamos si el usuario tiene el rol de administrador
        if ($user && $user->role->role === 'Administrador') {
            // Si el usuario tiene el rol de administrador, permitir el acceso
            return $next($request);
        }

        // Si el usuario no tiene el rol de administrador, redirigir a la página de inicio con un mensaje de error

        return redirect()->route('user.login')->with('failed','El Correo o la Contraseña no están en el sistema');
    }
}
