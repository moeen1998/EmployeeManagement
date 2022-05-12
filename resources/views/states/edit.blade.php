@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit State Form
                    <span class="float-end"><a href="{{ route('states.index') }}" class="text-decoration-none">Back</a></span>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('states.update',$state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="country_id" class="col-md-4 col-form-label text-md-end">Country Id</label>
                            <div class="col-md-6">
                                <select id="country_id" class="form-select form-select-sm form-control @error('country_id') is-invalid @enderror" aria-label=".form-select-sm example" name="country_id" value="{{ old('country_id',$state->country_id) }}" required autofocus>
                                    @foreach ($countries as $country)
                                    @if ($country->id == $state->country_id)
                                        <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                    @else
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endif
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
                                <input id="statename" type="text" class="form-control @error('statename') is-invalid @enderror" name="statename" value="{{ old('statename',$state->name) }}" required autocomplete="statename">

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
                                    Update The State
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
