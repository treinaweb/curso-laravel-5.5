<?php

namespace App\Http\Middleware;

use Closure;

class CheckTasks
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
        $ids = $request->session()->get('todotasks');

        if (!in_array($request->id, $ids)) {
            $request->session()->flash('error', 'Não foi possível excluir item da lista');

            return redirect()->route('clients.index');
        }

        return $next($request);
    }
}
