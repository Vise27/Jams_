<?php
use App\Models\User;
use App\Models\Crud\Product;
use App\Models\Crud\order;
$totalUsers = User::count();

$totalAdmins = User::where('role', 'administrador')->count();

$totalProducts = Product::count();

$totalOrder= Order::count();
?>

@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total usuarios</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalUsers }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total admin</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalAdmins }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total productos</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalProducts }}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection
