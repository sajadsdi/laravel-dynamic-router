<?php

namespace Sajadsdi\LaravelDynamicRouter\Http\Controllers;

use Illuminate\Routing\Controller;

class DynamicRouterTestController extends Controller
{
    public function testWeb()
    {
        echo "Laravel Dynamic Router Worked!";
    }

    public function testApi()
    {
        return response(['message' => "Laravel Dynamic Router Worked!"], 200);
    }
}
