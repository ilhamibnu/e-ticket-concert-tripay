<?php

namespace App\Http\Middleware;

use Closure;

class ModifyRequestMiddleware
{
    public function handle($request, Closure $next)
    {
        $request = $this->modifyRequestHeaders($request);

        return $next($request);
    }

    private function modifyRequestHeaders($request)
    {
        $headers = $request->headers->all();

        // Modifikasi header sesuai kebutuhan
        $headers['User-Agent'] = 'Windows'; // Ubah User-Agent menjadi Windows

        // Kembalikan permintaan dengan header yang dimodifikasi
        return $request->duplicate(null, null, $headers);
    }
}
