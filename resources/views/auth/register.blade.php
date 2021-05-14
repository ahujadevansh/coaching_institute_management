@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                        @isset($url)

                        {!! Form::open(['action' => 'Auth\RegisterController@create'.$url, 'method' => 'POST', 'enctype' => 'multipart/form-data',]) !!}
                        @else
                        
                        {!! Form::open(['action' => '{{ route("register") }}', 'method' => 'POST', 'enctype' => 'multipart/form-data',]) !!}
                        @endisset
                        {!! Form::token() !!}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Teacher Extra Fields -->
                        @if($url == 'teacher')
                        <div class="form-group row">
                                <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>
    
                                <div class="col-md-6">
                                    <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" required autocomplete="salary">
                                </div>
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                            
                        <div class="form-group row">
                                <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ __('Qualification') }}</label>
    
                                <div class="col-md-6">
                                    <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" required autocomplete="qualification">
                                </div>
                                @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group row">
                                <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>
    
                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" required autocomplete="subject">
                                </div>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <input id="description" type="text-area" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">
                                </div>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                                <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone_no') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" required autocomplete="phone_no">
                                </div>
                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                                <label for="cover_image" class="col-md-4 col-form-label text-md-right">{{ __('Cover Image') }}</label>
    
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image">
                                </div>
                                @error('cover_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        @endif

                        <!-- Student Extra Fields  -->

                        @if($url == 'student')

                        <div class="form-group row">
                                <label for="parent_email" class="col-md-4 col-form-label text-md-right">{{ __('Parent_email') }}</label>
    
                                <div class="col-md-6">
                                    <input id="parent_email" type="email" class="form-control @error('parent_email') is-invalid @enderror" name="parent_email" required autocomplete="parent_email">
                                </div>
                                @error('parent_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address">
                                </div>
                                @error('address')
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

                        <div class="form-group row">
                                <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone_no') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone_no" type="number" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" required autocomplete="phone_no">
                                </div>
                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
