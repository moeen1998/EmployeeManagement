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
      <h2 class="text-decoration-underline mb-4 text-muted">Employees Table</h2>
      <form class="row" action="{{ route('employees.index') }}">
        <div class="col">
          <input class="form-control" value="@isset($search){{$search}} @endisset" name="search" placeholder="Search Here By The Name Or Departement Id Or birthdate Or Hiring Dte" >
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary">Search</button>
          <button class="btn btn-primary mb-3 @if(! isset($search)) d-none  @endif"><a href="{{ route('employees.index') }}" class="text-decoration-none text-light">All Employees</a></button>
          <button class="btn btn-success float-end"><a href="{{ route('employees.create') }}" class="text-decoration-none text-light">Add Employee</a></button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered border-primary table-sm align-middle">
        <thead>
          <tr>	
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Departement (Id)</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">City</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Hiring Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employees as $employee)
            <tr>

              <th scope="row">{{ $employee->id }}</th>
              <td>{{ $employee->firstname }}</td>
              <td>{{ $employee->middlename }}</td>
              <td>{{ $employee->lastname }}</td>
              <td>{{ $employee->departement->name }} ( {{ $employee->departement_id }} )</td>
              <td>{{ $employee->country->name }}</td>
              <td>{{ $employee->state->name }}</td>
              <td>{{ $employee->city->name }}</td>
              <td>{{ $employee->zip_code }}</td>
              <td>{{ $employee->birthdate }}</td>
              <td>{{ $employee->date_hired }}</td>
              <td>
                <button class="btn btn-success text-light" type="button">
                  <a class="text-light text-decoration-none" href="{{route('employees.edit',$employee->id)}}">Edit</a>
                </button>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" class="d-inline">
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