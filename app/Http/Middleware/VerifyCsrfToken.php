<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://127.0.0.1:8000/store',
        'http://127.0.0.1:8000/sale/*',
        'http://127.0.0.1:8000/products',
        'http://127.0.0.1:8000/products/open_clouse/*',
        'import'
    ];
}
