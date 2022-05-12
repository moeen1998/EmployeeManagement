@extends('layouts.main')

@section('content')
  @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session()->get('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  <div class="card">
    <div class="card-header">
      <h2 class="text-decoration-underline mb-4 text-muted">Cities Table</h2>
      <form class="row" action="{{ route('cities.index') }}">
        <div class="col">
          <input class="form-control" value="@isset($search){{$search}} @endisset" name="search" placeholder="Search Here By City Name Or State Id" >
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary mb-3">Search</button>
          <button class="btn btn-primary mb-3 @if(! isset($search)) d-none  @endif"><a href="{{ route('cities.index') }}" class="text-decoration-none text-light">All States</a></button>
          <button class="btn btn-success float-end mb-3"><a href="{{ route('cities.create') }}" class="text-decoration-none text-light">Add City</a></button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered border-primary">
        <thead>
          <tr>	
            <th scope="col">#</th>
            <th scope="col">State name</th>
            <th scope="col">State Id</th>
            <th scope="col">City Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cities as $city)
            <tr>
              <th scope="row">{{ $city->id }}</th>
              <td>{{ $city->state->name }}</td>
              <td>{{ $city->state_id }}</td>
              <td>{{ $city->name }}</td>

              <td>
                <button class="btn btn-success text-light" type="button">
                  <a class="text-light text-decoration-none" href="{{route('cities.edit',$city->id)}}">Edit</a>
                </button>
                <form action="{{ route('cities.destroy',$city->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method("DELETE")
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
@endsection