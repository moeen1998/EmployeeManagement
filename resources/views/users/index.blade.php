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
      <h2 class="text-decoration-underline mb-4 text-muted">Users Table</h2>
      <form class="row" action="{{ route('users.index') }}">
        <div class="col">
          <input class="form-control" value="@isset($search){{$search}} @endisset" name="search" placeholder="Search Here By UserName Or Email" >
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary mb-3">Search</button>
          <button class="btn btn-primary mb-3 @if(! isset($search)) d-none  @endif"><a href="{{ route('users.index') }}" class="text-decoration-none text-light">All Users</a></button>
          <button class="btn btn-success float-end mb-3"><a href="{{ route('users.create') }}" class="text-decoration-none text-light">Add User</a></button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->username }}</td>
              <td>{{ $user->firstname }}</td>
              <td>{{ $user->lastname }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <button class="btn btn-success text-light" type="button">
                  <a class="text-light text-decoration-none" href="{{route('users.edit',$user->id)}}">Edit</a>
                </button>

                @if (Auth::user()->username != $user->username)
                  <form action="{{ route('users.destroy',$user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                @else
                  <p class="text-muted d-inline ms-1">
                    That Is You
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