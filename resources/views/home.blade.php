@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Админская панель</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><a href="{{route('products.index')}}">Продукты</a></p>
                    <p><a href="{{route('address.index')}}">Адреса</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
