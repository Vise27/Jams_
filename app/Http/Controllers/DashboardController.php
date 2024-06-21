<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Crud\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalUsers = User::count();

        $totalAdmins = User::where('role', 'administrador')->count();

        $totalProducts = Product::count();
        return view('admin.dashboard', compact('totalUsers', 'totalAdmins', 'totalProducts'));

    }
    
}
