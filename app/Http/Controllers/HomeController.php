<?php

namespace App\Http\Controllers;

use App\Address;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }

  public function getProducts(Request $request)
  {
    return $this->jsonResponse(Product::all());
  }

  public function getAddresses(Request $request)
  {
    return $this->jsonResponse(Address::all());
  }
}
