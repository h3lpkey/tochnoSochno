@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">@if(isset($product)) Редактировать {{$product->name}} @else Создать продукт @endif</div>

          <div class="card-body">

            <form method="post"  @if(isset($product)) action="{{route('products.update', $product)}}" @else action="{{route('products.store')}}" @endif  enctype="multipart/form-data">
              @csrf
              @if(isset($product)) @method('PATCH') @endif
              <div class="form-group">
                <label for="exampleFormControlInput1">Название</label>
                <input type="text" class="form-control" name="name" @if(isset($product)) value="{{$product->name}}" @else value="{{old('name')}}" @endif>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Описание</label>
                <input type="text" class="form-control" name="description" @if(isset($product)) value="{{$product->description}}" @else value="{{old('description')}}" @endif>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Грамм</label>
                <input type="text" class="form-control" name="gramms" @if(isset($product)) value="{{$product->gramms}}" @else value="{{old('gramms')}}" @endif>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Цена</label>
                <input type="text" class="form-control" name="price" @if(isset($product)) value="{{$product->price}}" @else value="{{old('price')}}" @endif>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Изображение</label>
                <input type="file" class="form-control-file" name="src" value="@if(isset($product)) {{$product->src}} @endif">
              </div>
              <button class="btn btn-success" type="submit">Сохранить</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
