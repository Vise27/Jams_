<?php

namespace App\Http\Controllers;

use App\Models\Crud\Brand;
use App\Models\Crud\Categorie;
use App\Models\Crud\DetailsProduct;
use App\Models\Crud\Modelo;
use Illuminate\Http\Request;
use App\Models\Crud\Product;

class FrontController extends Controller
{
    //
    public function index(Request $request, DetailsProduct $detailsProducts, Brand $Brands, Modelo $Modelos, Categorie $categorie){
        if ($request->has('q')) {
            $query = $request->input('q');
            $terms = explode(' ', $query); // Dividir la cadena de búsqueda en palabras

                        // Inicializar variables
            $modelo_ids = [];
            $brand_ids = [];
            $categorie_ids = [];
            $name_terms = [];
        
            // Obtener listas de modelos, marcas y categorías desde la base de datos
            $modelos = Modelo::pluck('name', 'id')->toArray();
            $brands = Brand::pluck('name', 'id')->toArray();
            $categories = Categorie::pluck('name', 'id')->toArray();
            $names = Product::pluck('name')->toArray();
        
            // Determinar qué términos corresponden a modelo, brand, category y name
            foreach ($terms as $term) {
                foreach ($modelos as $name => $id) {
                    if (stripos($name, $term) !== false) {
                        $modelo_ids[] = $id;
                    }
                }
                foreach ($brands as $name => $id) {
                    if (stripos($name, $term) !== false) {
                        $brand_ids[] = $id;
                    }
                }
                foreach ($categories as $name => $id) {
                    if (stripos($name, $term) !== false) {
                        $categorie_ids[] = $id;
                    }
                }
                foreach ($names as $name) {
                    if (stripos($name, $term) !== false) {
                        $name_terms[] = $name;
                    }
                }
            }
        
            // Construir la consulta
            $queryBuilder = Product::where('status', 'active');
        
            // Añadir condiciones basadas en los términos de búsqueda
            if (!empty($name_terms)) {
                $queryBuilder->where(function($q) use ($name_terms) {
                    foreach ($name_terms as $name_term) {
                        $q->orWhere('name', 'like', '%' . $name_term . '%');
                    }
                });
            }
        
            if (!empty($modelo_ids)) {
                $queryBuilder->whereIn('modelo_id', $modelo_ids);
            }
        
            if (!empty($brand_ids)) {
                $queryBuilder->whereIn('brand_id', $brand_ids);
            }
        
            if (!empty($categorie_ids)) {
                $queryBuilder->whereIn('categorie_id', $categorie_ids);
            }
        
            $products = $queryBuilder->orderBy('id', 'desc')->get();
    }elseif ($request->has('modelo')) {
            $modelo = $request->input('modelo');
        
            if ($modelo === 'Deportivas') {
                $modelo_id = 1;
            } elseif ($modelo === 'Casuales') {
                $modelo_id = 2;
            } elseif ($modelo === 'Botas') {
                $modelo_id = 3;  
            } elseif ($modelo === 'Tacones') {
                $modelo_id = 4;  
            } elseif ($modelo === 'Formales') {
                $modelo_id = 5;  
            } else {
                $modelo_id = null;  
            }
            
            if (!is_null($modelo_id)) {
                $products = Product::where('status', 'active')
                                   ->where('modelo_id', $modelo_id)
                                   ->orderBy('id', 'desc')
                                   ->get();
            } else {
                $products = Product::where('status', 'active')
                                   ->orderBy('id', 'desc')
                                   ->take(9)
                                   ->get();
            }
        } elseif ($request->has('brand')) {
            $brand = $request->input('brand');
        
            if ($brand === 'Adidas') {
                $brand_id = 1;
            } elseif ($brand === 'Nike') {
                $brand_id = 2;
            } elseif ($brand === 'Jordan') {
                $brand_id = 3;  
            } elseif ($brand === 'Reebok') {
                $brand_id = 4;  
            } elseif ($brand === 'Puma') {
                $brand_id = 5;  
            } else {
                $brand_id = null;  
            }
            
            if (!is_null($brand_id)) {
                $products = Product::where('status', 'active')
                                   ->where('brand_id', $brand_id)
                                   ->orderBy('id', 'desc')
                                   ->get();
            } else {
                $products = Product::where('status', 'active')
                                   ->orderBy('id', 'desc')
                                   ->take(9)
                                   ->get();
            }
        } else {
            $products = Product::where('status', 'active')
                               ->orderBy('id', 'desc')
                               ->take(12)
                               ->get();
        }
        
        $detailsProducts = DetailsProduct::all();

        $brands = Brand::all();

        $modelos = Modelo::all();

        $categories = Categorie::all();

        return view('aplicacion.front.index', compact('products', 'detailsProducts', 'brands', 'modelos', 'categories'));

    }
}





