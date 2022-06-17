<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(){        
        return view('admin_manage.home');
    }
}
