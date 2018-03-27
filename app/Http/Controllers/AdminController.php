<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class AdminController extends Controller
{
    public function getIndex(){
        $products = Product::where('today',1);
        return view('admin_pages.index', compact('products'));
    }

    public function getCategory(){
        $category = Category::all();
        return view('admin_pages.category.category',compact('category'));
    }
}
