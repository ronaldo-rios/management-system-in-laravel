<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAccess;

class LogAcessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   

        $ip = $request->server()->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcces::create(['log' => "IP $ip requisitou a rota $rota"]);
        $resposta = setStatusCode(201, "Status modificado!");
        return $resposta;
    }
}
