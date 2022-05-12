@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create New Countr Form
                    <span class="float-end"><a href="{{ route('countries.index') }}" class="text-decoration-none">Back</a></span>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('countries.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="countryname" class="col-md-4 col-form-label text-md-end">Country Name</label>
                            <div class="col-md-6">
                                <input id="countryname" type="text" class="form-control @error('countryname') is-invalid @enderror" name="countryname" value="{{ old('countryname') }}" required autocomplete="countryname" autofocus>

                                @error('countryname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="countrycode" class="col-md-4 col-form-label text-md-end">Country Code</label>

                            <div class="col-md-6">
                                <input id="countrycode" type="text" class="form-control @error('countrycode') is-invalid @enderror" name="countrycode" value="{{ old('countrycode') }}" required autocomplete="countrycode">

                                @error('countrycode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save The Country
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
