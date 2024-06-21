<?php

namespace App\Http\Controllers;

use App\Models\Crud\Brand;
use App\Models\Crud\Categorie;
use App\Models\Crud\DetailsProduct;
use App\Models\Crud\Modelo;
use App\Models\Crud\Product;
use Illuminate\Http\Request;

class ListController extends Controller

    
{

    public function seccion1(Request $request, DetailsProduct $detailsProducts, Brand $brands, Modelo $modelos, Categorie $categorie){

        $products = Product::where('status', 'active')->where('categorie_id', 1)->orderBy('id', 'desc')->get();

        $detailsProducts = DetailsProduct::all();

        $brands = Brand::all();

        $modelos = Modelo::all();

        $categories = Categorie::all();

        return view('aplicacion.front.seccion_1', compact('products', 'detailsProducts', 'brands', 'modelos', 'categories'));
    }
    
    public function seccion2(Request $request, DetailsProduct $detailsProducts, Brand $brands, Modelo $modelos, Categorie $categorie){

        $products = Product::where('status', 'active')->where('categorie_id', 2)->orderBy('id', 'desc')->get();

        $detailsProducts = DetailsProduct::all();

        $brands = Brand::all();

        $modelos = Modelo::all();

        $categories = Categorie::all();

        return view('aplicacion.front.seccion_2', compact('products', 'detailsProducts', 'brands', 'modelos', 'categories'));
    }

    public function seccion3(Request $request, DetailsProduct $detailsProducts, Brand $brands, Modelo $modelos, Categorie $categorie){

        $products = Product::where('status', 'active')->where('categorie_id', 3)->orderBy('id', 'desc')->get();

        $detailsProducts = DetailsProduct::all();

        $brands = Brand::all();

        $modelos = Modelo::all();

        $categories = Categorie::all();

        return view('aplicacion.front.seccion_3', compact('products', 'detailsProducts', 'brands', 'modelos', 'categories'));
    }

    public function seccion4(Request $request, DetailsProduct $detailsProducts, Brand $brands, Modelo $modelos, Categorie $categorie){

        $products = Product::where('status', 'active')->where('categorie_id', 4)->orderBy('id', 'desc')->get();

        $detailsProducts = DetailsProduct::all();

        $brands = Brand::all();

        $modelos = Modelo::all();

        $categories = Categorie::all();

        return view('aplicacion.front.seccion_4', compact('products', 'detailsProducts', 'brands', 'modelos', 'categories'));
    }
}
