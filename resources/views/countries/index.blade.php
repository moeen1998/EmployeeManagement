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
      <h2 class="text-decoration-underline mb-4 text-muted">Countries Table</h2>
      <form class="row" action="{{ route('countries.index') }}">
        <div class="col">
          <input value="@isset($search){{$search}} @endisset" class="form-control" name="search" placeholder="Search Here By Country Name" >
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary mb-3">Search</button>
          <button class="btn btn-primary mb-3  @if(! isset($search)) d-none  @endif"><a href="{{ route('countries.index') }}" class="text-decoration-none text-light">All Countries</a></button>
          <button class="btn btn-success float-end mb-3"><a href="{{ route('countries.create') }}" class="text-decoration-none text-light">Add country</a></button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Country Name</th>
            <th scope="col">Country Code</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($countries as $country)
            <tr>
              <th scope="row">{{ $country->id }}</th>
              <td>{{ $country->name }}</td>
              <td>{{ $country->country_code }}</td>

              <td>
                <button class="btn btn-success text-light" type="button">
                  <a class="text-light text-decoration-none" href="{{route('countries.edit',$country->id)}}">Edit</a>
                </button>
                @if (count($country->states) == 0)
                  <form action="{{ route('countries.destroy',$country->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                @else
                  <p class="text-muted d-inline ms-4">
                    This Country Has {{count($country->states)}} States So You Can't Delete
                  </p>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
@endsection