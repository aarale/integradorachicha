<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// class RoleMiddleware
// {
//     /**
//      * Maneja la solicitud entrante.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @param  string  $role
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next, $role)
//     {
//         // Verificar si el usuario está autenticado
//         if (!Auth::check()) {
//             return redirect('/login'); 
//         }

//         // Obtener el usuario autenticado y verificar si tiene el rol
//         $user = Auth::user();
        
//         // Comprobar si el usuario tiene el rol requerido
//         if (!$user->roles->contains('name', $role)) {
//             abort(403, 'No tienes permiso para acceder a esta página.');
//         }

//         // Continuar con la solicitud si el usuario tiene el rol adecuado
//         return $next($request);
//     }
// }
