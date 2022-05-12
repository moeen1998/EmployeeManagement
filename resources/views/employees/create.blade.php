@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create New Employee Form
                    <span class="float-end"><a href="{{ route('employees.index') }}" class="text-decoration-none">Back</a></span>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Middle Name</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename">

                                @error('middlename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="departement_id" class="col-md-4 col-form-label text-md-end">Departement Id</label>
                            <div class="col-md-6">
                                <select id="departement_id" class="form-select form-select-sm form-control @error('departement_id') is-invalid @enderror" aria-label=".form-select-sm example" name="departement_id" value="{{ old('departement_id') }}" required autofocus>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}">{{$departement->name}}</option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  for="country_id" class="col-md-4 col-form-label text-md-end">Country Id</label>
                            <div class="col-md-6">
                                <select id="country_id" class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name="country_id" value="{{ old('country_id') }}" required autofocus>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  for="state_id" class="col-md-4 col-form-label text-md-end">State Id</label>
                            <div class="col-md-6">
                                <select id="state_id" class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name="state_id" value="{{ old('state_id') }}" required autofocus>
                                
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label  for="city_id" class="col-md-4 col-form-label text-md-end">City Id</label>
                            <div class="col-md-6">
                                <select id="city_id" class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name="city_id" value="{{ old('city_id') }}" required autofocus>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip Code</label>
                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code">
                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">Birth Date</label>
                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate">
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_hired" class="col-md-4 col-form-label text-md-end">Hiring Date</label>
                            <div class="col-md-6">
                                <input id="date_hired" type="date" class="form-control @error('date_hired') is-invalid @enderror" name="date_hired" value="{{ old('date_hired') }}" required autocomplete="date_hired">
                                @error('date_hired')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save The Employee
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#country_id').on('change', function() {
            var country_id = this.value;
            $("#state_id").html('');
            $.ajax({
                url:"/state/" + country_id,
                type: "get",
                dataType : 'json',
                success: function(result){
                    $('#state_id').html('<option value="">Select State</option>'); 
                    $.each(result,function(key,value){
                        $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            });
        });    
        $('#state_id').on('change', function() {
            var state_id = this.value;
            $("#city_id").html('');
            $.ajax({
                url:"/city/" + state_id,
                type: "get",
                dataType : 'json',
                success: function(result){
                    $('#city_id').html('<option value="">Select City</option>'); 
                    $.each(result,function(key,value){
                        $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
                }
            });
        });
    });

</script>
@endsection
