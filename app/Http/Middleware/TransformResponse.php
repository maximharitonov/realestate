<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as CODE;


class TransformResponse
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
        $data = $next($request);

        if ($data)
            return Response::json([
                'success'       =>  true,
                'HTTP_CODE'     =>  CODE::HTTP_OK,
                'data'          =>  $data
            ]);

        return Response::json([
            'success'   =>  false,
            'HTTP_CODE' =>  CODE::HTTP_NOT_FOUND,
        ]);
    }
}
