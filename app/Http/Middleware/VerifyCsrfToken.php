<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "category/add",
        "category/update",
        "category/delete",
        "news/add",
        "news/update",
        "news/delete",
        "product/add",
        "product/update",
        "product/delete",
        "search",
        "register",
        "login",
        "addcart"
    ];
}
