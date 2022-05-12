@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create New State Form
                    <span class="float-end"><a href="{{ route('states.index') }}" class="text-decoration-none">Back</a></span>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('states.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="country_id" class="col-md-4 col-form-label text-md-end">Country name</label>
                            <div class="col-md-6">
                                <select id="country_id" class="form-select form-select-sm form-control @error('country_id') is-invalid @enderror" aria-label=".form-select-sm example" name="country_id" value="{{ old('country_id') }}" required autofocus>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="statename" class="col-md-4 col-form-label text-md-end">State Name</label>

                            <div class="col-md-6">
                                <input id="statename" type="text" class="form-control @error('statename') is-invalid @enderror" name="statename" value="{{ old('statename') }}" required autocomplete="statename">

                                @error('statename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save The State
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
