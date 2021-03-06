<?php

namespace App\Http\Controllers;

use App\Address;
use App\Mail\CallBackMessage;
use App\Mail\SendFormFromWebsite;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

  public function callback(Request $request)
  {
    Mail::to(env('ADMIN_MAIL'))->send(new SendFormFromWebsite($request));

    return $this->jsonResponse($data['status'] = 'success');
  }
}
