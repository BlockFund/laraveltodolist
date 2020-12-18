<?php

namespace App\Http\Controllers;


class IndexController extends Controller
{
    function __invoke()
    {
        return view('welcome');
    }
}
