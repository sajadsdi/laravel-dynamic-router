<?php

namespace Sajadsdi\LaravelDynamicRouter\Http\Controllers;

use Illuminate\Routing\Controller;

class DynamicRouterTestController extends Controller
{
    public function testWeb()
    {
        echo "Laravel Dynamic Router worked for parent-route web api!";
    }

    public function testChildWeb()
    {
        echo "Laravel Dynamic Router worked for child1 web api!";
    }

    public function testApi()
    {
        return response(['message' => "Laravel Dynamic Router worked for parent-rout api!"], 200);
    }

    public function testChildApi()
    {
        return response(['message' => "Laravel Dynamic Router worked for child1 api!"], 200);
    }
}
