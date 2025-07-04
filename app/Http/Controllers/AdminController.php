<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
       // $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
