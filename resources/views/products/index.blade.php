@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Продукты</div>


          <div class="card-body">
            <p><a class="btn btn-success" href="{{route('products.create')}}">Создать</a></p>
            <table class="table table-striped" id="dataTable">
              <thead class="thead-dark">
              <tr>
                <th scope="col">Название</th>
                <th scope="col">Изображение</th>
                <th scope="col">Действия</th>
              </tr>
              </thead>
              <tbody>
              @forelse($products as $product)
                <tr>
                  <td>{{$product->name}}</td>
                  <td><a href="{{$product->src}}">Ссылка на изображение</a></td>
                  <td>
                    <a href="{{route('products.edit', $product)}}" class="badge badge-primary">Редактировать</a>
                    <form class="d-inline-block" method="post" action="{{route('products.destroy', $product)}}">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="badge badge-danger del">Удалить</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center"><h5>Продуктов нет</h5></td>
                </tr>
              @endforelse
              </tbody>
            </table>
            {{$products->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
