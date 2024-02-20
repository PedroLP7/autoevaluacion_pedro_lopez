<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();
        if($user->tipus_usuaris_id != 1){
            session()->flash('error', ' Para ver esta pagina tienes que ser admin.');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
