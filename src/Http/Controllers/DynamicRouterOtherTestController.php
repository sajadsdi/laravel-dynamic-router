<?php

namespace Sajadsdi\LaravelDynamicRouter\Http\Controllers;

use Illuminate\Routing\Controller;

class DynamicRouterOtherTestController extends Controller
{
    public function testChildWeb()
    {
        echo "Laravel Dynamic Router worked for child2 web api!";
    }

    public function testChildApi()
    {
        return response(['message' => "Laravel Dynamic Router worked for child2 api!"], 200);
    }
}
