<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AdressController extends Controller
{
  public function index()
  {
    $addresses = Address::orderBy('created_at')->paginate(10);
    return view('addresses.index', compact('addresses'));
  }

  public function create()
  {
    return view('addresses.form');
  }

  public function store(Request $request)
  {
    $address = new Address();
    $address->address_short = $request->address_short;
    $address->address_long = $request->address_long;
    $address->time_work = $request->time_work;
    $address->save();

    return redirect(route('address.index'));
  }

  public function edit(Address $address)
  {
    return view('addresses.form', compact('address'));
  }

  public function update(Address $address, Request $request)
  {
    $address->address_short = $request->address_short;
    $address->address_long = $request->address_long;
    $address->time_work = $request->time_work;
    $address->update();

    return redirect(route('address.index'));
  }

  public function destroy(Address $address, Request $request)
  {
    $address->delete();
    return redirect(route('address.index'));
  }
}
