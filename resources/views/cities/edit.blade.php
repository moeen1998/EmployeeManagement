@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    City Edit Form
                    <span class="float-end"><a href="{{ route('cities.index') }}" class="text-decoration-none">Back</a></span>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update',$city->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="state_id" class="col-md-4 col-form-label text-md-end">State Id</label>
                            <div class="col-md-6">
                                <select id="state_id" class="form-select form-select-sm form-control @error('state_id') is-invalid @enderror" aria-label=".form-select-sm example" name="state_id" value="{{ old('state_id',$city->state_id) }}" required autofocus>
                                    @foreach ($states as $state)
                                    @if ($state->id == $city->state_id)
                                        <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cityname" class="col-md-4 col-form-label text-md-end">City Name</label>

                            <div class="col-md-6">
                                <input id="cityname" type="text" class="form-control @error('cityname') is-invalid @enderror" name="cityname" value="{{ old('cityname',$city->name) }}" required autocomplete="cityname">

                                @error('cityname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update The City
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
