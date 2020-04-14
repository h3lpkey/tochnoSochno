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
  public function __construct()
  {
    $this->middleware('admin');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }

  public function getProducts()
  {
    return $this->jsonResponse(Product::all());
  }

  public function getAddresses()
  {
    return $this->jsonResponse(Address::all());
  }
}
