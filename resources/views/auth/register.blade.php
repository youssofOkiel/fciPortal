@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



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
                            <label for="SSD" class="col-md-4 col-form-label text-md-right">SSD</label>

                            <div class="col-md-6">
                                <input id="SSD" type="text" class="form-control"  name="SSD"
                                       required  minlength="14" maxlength="14"
                                       autocomplete="SSD" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="leve" class="col-md-4 col-form-label text-md-right">Level</label>

                            <div class="col-md-6">

                                <select class="form-control" name="level" id="level"
                                        aria-label="levelTitle" aria-describedby="addon-wrapping"
                                        required  autofocus>
                                    <option value="" ></option>
                                    <option value="1" >Level 1</option>
                                    <option value="2" >Level 2</option>
                                    <option value="3" >Level 3</option>
                                    <option value="4" >Level 4</option>

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gpa" class="col-md-4 col-form-label text-md-right">GPA</label>

                            <div class="col-md-6">
                                <input id="gpa" type="number" min="0" max="4" step=".01" class="form-control"
                                       name="gpa"
                                       required autocomplete="gpa" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="credit" class="col-md-4 col-form-label text-md-right">CREDIT</label>

                            <div class="col-md-6">
                                <input id="credit" type="number" min="0" max="144"
                                       class="form-control"
                                       name="credit"  required autocomplete="credit" autofocus>
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
