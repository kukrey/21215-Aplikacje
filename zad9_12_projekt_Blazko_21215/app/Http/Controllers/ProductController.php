<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by manufacturer
        if ($request->filled('manufacturer')) {
            $query->where('manufacturer_id', $request->manufacturer);
        }

        // Sort
        $sortBy = $request->get('sort', 'name');
        $sortOrder = $request->get('order', 'asc');
        
        if ($sortBy === 'price') {
            $query->orderBy('price', $sortOrder);
        } elseif ($sortBy === 'stock') {
            $query->orderBy('stock_quantity', $sortOrder);
        } else {
            $query->orderBy('name', $sortOrder);
        }

        $products = $query->paginate(12);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('products.index', compact('products', 'categories', 'manufacturers'));
    }
}
