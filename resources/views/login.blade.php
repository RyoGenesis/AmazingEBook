@extends('layout.layout')
@section('content')
    <div>
        <h1 class="text-decoration-underline">@lang('lang.log_in')</h1>
        <form action="{{ route('login')}}" method="POST" class="mt-3" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <label for="email" class="col-2 col-form-label">@lang('lang.email_address'):</label>
                <div class="col-4">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-4">
                <label for="password" class="col-2 col-form-label">@lang('lang.password'):</label>
                <div class="col-4">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                @if ($errors != null)
                    @foreach ($errors->all() as $error)
                        @if($error == "Invalid Account!")
                            <p class="text-danger">@lang('lang.invalid_account')</p>
                        @endif
                    @endforeach
                @endif
                <button type="submit" class="btn btn-warning my-3 px-5">@lang('lang.submit')</button>
                <a href="{{route('signup.index')}}"><p>@lang('lang.no_account')</p></a>
            </div>
        </form>
    </div>
    	
@endsection