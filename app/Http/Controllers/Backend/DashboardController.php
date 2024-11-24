<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Return view for dashboard index
     */
    public function index(): View
    {
        return view('backend.dashboard.index');
    }
}
