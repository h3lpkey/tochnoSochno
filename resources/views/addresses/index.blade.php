@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Адреса</div>


          <div class="card-body">
            <p><a class="btn btn-success" href="{{route('address.create')}}">Создать</a></p>
            <table class="table table-striped" id="dataTable">
              <thead class="thead-dark">
              <tr>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
              </tr>
              </thead>
              <tbody>
              @forelse($addresses as $address)
                <tr>
                  <td>{{$address->address_short}}</td>
                  <td>
                    <a href="{{route('address.edit', $address)}}" class="badge badge-primary">Редактировать</a>
                    <form class="d-inline-block" method="post" action="{{route('address.destroy', $address)}}">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="badge badge-danger del">Удалить</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center"><h5>Адресов нет</h5></td>
                </tr>
              @endforelse
              </tbody>
            </table>
            {{$addresses->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
