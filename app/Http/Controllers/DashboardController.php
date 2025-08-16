<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorize('seller');
    }


    public function index()
    {
        return view("dashboard.index");
    }
}
