@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">@if(isset($address)) Редактировать {{$address->name}} @else Создать продукт @endif</div>

          <div class="card-body">

            <form method="post"  @if(isset($address)) action="{{route('address.update', $address)}}" @else action="{{route('address.store')}}" @endif  enctype="multipart/form-data">
              @csrf
              @if(isset($address)) @method('PATCH') @endif
              <div class="form-group">
                <label for="exampleFormControlInput1">Короткий адрес</label>
                <input type="text" class="form-control" name="address_short" @if(isset($address)) value="{{$address->address_short}}" @else value="{{old('address_short')}}" @endif>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Полный адрес</label>
                <textarea name="address_long" class="form-control" id="exampleFormControlTextarea1" rows="4">@if(isset($address)){{$address->address_long}}@else{{old('address_long')}}@endif</textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Часы работы</label>
                <textarea name="time_work" class="form-control" id="exampleFormControlTextarea1" rows="4">@if(isset($address)){{$address->time_work}}@else{{old('time_work')}}@endif</textarea>
              </div>
              <button class="btn btn-success" type="submit">Сохранить</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
