@extends('layout.layout')
@section('content')
    <div>
        <h1 class="text-decoration-underline">@lang('lang.signup')</h1>
        <div class="mt-3">
            <form action="{{ route('signup')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-6 row mb-4">
                        <label for="first_name" class="col-4 col-form-label">@lang('lang.first_name'):</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name">
                            @error('first_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="middle_name" class="col-4 col-form-label">@lang('lang.middle_name'):</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name">
                            @error('middle_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="last_name" class="col-4 col-form-label">@lang('lang.last_name'):</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name">
                            @error('last_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="email" class="col-4 col-form-label">@lang('lang.email_address'):</label>
                        <div class="col-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="gender" class="col-4 col-form-label">@lang('lang.gender'):</label>
                        <div class="col-8">
                            @foreach ($param['genders'] as $gender) 
                                <div class="form-check form-check-inline">
                                    <input class="@error('gender') is-invalid @enderror" type="radio" 
                                            name="gender" id="{{$gender->gender_desc}}" value="{{$gender->gender_id}}">
                                    <label for="{{$gender->gender_desc}}">{{$gender->gender_desc}}</label>
                                </div>
                            @endforeach
                            @error('gender')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="role" class="col-4 col-form-label">@lang('lang.role'):</label>
                        <div class="col-8">
                            <select class="form-select form-select-sm @error('role') is-invalid @enderror" name="role" id="role">
                                <option value="" selected>@lang('lang.choose_role')</option>
                                @forelse ($param['roles'] as $role)
                                    <option value="{{$role->role_id}}">{{$role->role_desc}}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('role')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="password" class="col-4 col-form-label">@lang('lang.password'):</label>
                        <div class="col-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="picture" class="col-4 col-form-label">@lang('lang.display_picture'):</label>
                        <div class="col-8">
                            <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture">
                            @error('picture')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning my-3 px-5">@lang('lang.submit')</button>
                    <a href="{{route('login.index')}}"><p>@lang('lang.have_account')</p></a>
                </div>
            </form>

        </div>
    </div>
    	
@endsection