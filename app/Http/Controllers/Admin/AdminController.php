<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.home');
    }

    /**
     * Show the application files manager/uploads dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploads()
    {
        return view('admin.pages.uploads');
    }
}
