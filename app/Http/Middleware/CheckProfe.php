<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();
        if($user->tipus_usuaris_id != 2){
            session()->flash('error', ' Tienes que ser profe para ver esta pagina');
            return redirect()->route('home');
        }
        return $next($request);
    }
}
