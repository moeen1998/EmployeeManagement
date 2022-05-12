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
      <h2 class="text-decoration-underline mb-4 text-muted">States Table</h2>
      <form class="row" action="{{ route('states.index') }}">
        <div class="col">
          <input class="form-control" value="@isset($search){{$search}} @endisset" name="search" placeholder="Search Here By State Name Or Country Id" >
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary mb-3">Search</button>
          <button class="btn btn-primary mb-3 @if(! isset($search)) d-none  @endif"><a href="{{ route('states.index') }}" class="text-decoration-none text-light">All States</a></button>
          <button class="btn btn-success float-end mb-3"><a href="{{ route('states.create') }}" class="text-decoration-none text-light">Add State</a></button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered border-primary">
        <thead>
          <tr>	
            <th scope="col">#</th>
            <th scope="col">Country name</th>
            <th scope="col">Country Id</th>
            <th scope="col">State Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($states as $state)
            <tr>
              <th scope="row">{{ $state->id }}</th>
              <td>{{ $state->country->name }}</td>
              <td>{{ $state->country_id }}</td>
              <td>{{ $state->name }}</td>

              <td>
                <button class="btn btn-success text-light" type="button">
                  <a class="text-light text-decoration-none" href="{{route('states.edit',$state->id)}}">Edit</a>
                </button>
                @if (count($state->cities) == 0)
                  <form action="{{ route('states.destroy',$state->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                @else
                  <p class="text-muted d-md-inline ms-md-4 text-md-center">
                    This State Has {{count($state->cities)}} Cities So You Can't Delete
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