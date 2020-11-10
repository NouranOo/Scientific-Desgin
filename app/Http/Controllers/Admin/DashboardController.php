<?php

namespace App\Http\Controllers\Admin;

use App\Repository\PublicRepository;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $orders = PublicRepository::findAll('Order');
        return view('admin.dashboard', compact('orders'));
    }

}
