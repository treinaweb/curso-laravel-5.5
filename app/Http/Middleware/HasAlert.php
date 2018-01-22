<?php

namespace App\Http\Middleware;

use Closure;

class HasAlert
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
        $response = $next($request);

        $ids = $request->session()->get('todotasks', []);

        if ($ids) {
            $tasks = count($ids);

            $request->session()->flash('alert', "Você tem {$tasks} tarefas pendentes");
        } 

        return $response;
    }
}
