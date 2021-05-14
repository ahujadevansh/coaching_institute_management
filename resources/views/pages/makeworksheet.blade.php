@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Work Sheet</div>

                <div class="card-body">

                {!! Form::open(['action' => 'PagesController@makeworksheet', 'method' => 'POST', 'enctype' => 'multipart/form-data',]) !!}
                {!! Form::token() !!}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="teacher_name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus readonly="readonly\">
                    </div>
                </div>

                <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text-area" class="form-control" name="description" required autocomplete="description">
                        </div>
                </div>
                <div class="form-group row">
                        <label for="cover_image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Worksheet') }}</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="file">
                        </div>
                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                        <label for="standard" class="col-md-4 col-form-label text-md-right">{{ __('Standard') }}</label>

                        <div class="col-md-6">
                            <input id="standard" type="number" class="form-control @error('standard') is-invalid @enderror" name="standard" required autocomplete="standard">
                        </div>
                        @error('standard')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
