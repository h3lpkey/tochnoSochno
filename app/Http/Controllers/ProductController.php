<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::orderBy('created_at')->paginate(10);
    return view('products.index', compact('products'));
  }

  public function create()
  {
    return view('products.form');
  }

  public function store(Request $request)
  {
    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->description_type = $request->description_type;
    $product->public_name = $request->public_name;
    $product->type = $request->type;
    $product->gramms = $request->gramms;
    $product->price = $request->price;

    $path = $request->src->store($request->name);
    $product->src = $path;

    $product->save();

    return redirect(route('products.index'));
  }

  public function edit(Product $product)
  {
    return view('products.form', compact('product'));
  }

  public function update(Product $product, Request $request)
  {
    $product->name = $request->name;

    $product->description = $request->description;
    $product->description_type = $request->description_type;
    $product->public_name = $request->public_name;
    $product->type = $request->type;
    $product->gramms = $request->gramms;
    $product->price = $request->price;
    if (isset($request->src)) {
      $path = $request->src->store($request->name);
      $product->src = $path;
    }

    $product->update();

    return redirect(route('products.index'));
  }

  public function destroy(Product $product, Request $request)
  {
    $product->delete();
    return redirect(route('products.index'));
  }
}
