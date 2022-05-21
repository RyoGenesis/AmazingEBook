@extends('layout.layout')
@section('content')
    <div class="row mt-3">
        <div class="col-md-2 col-12 mb-2 mb-md-0">
            <img style="width: 170px; height: 250px; object-fit: cover;"
                    src="{{ Storage::url($param['account']->display_picture) }}">
        </div>
        <div class="col-md-10 col-12">
            <form action="{{ route('profile.update')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6 row mb-4">
                        <label for="first_name" class="col-4 col-form-label">@lang('lang.first_name'):</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"
                                value="{{$param['account']->first_name}}">
                            @error('first_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="middle_name" class="col-4 col-form-label">@lang('lang.middle_name'):</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name"
                                value="{{$param['account']->middle_name}}">
                            @error('middle_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="last_name" class="col-4 col-form-label">@lang('lang.last_name'):</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"
                                value="{{$param['account']->last_name}}">
                            @error('last_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="email" class="col-4 col-form-label">@lang('lang.email_address'):</label>
                        <div class="col-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                value="{{$param['account']->email}}">
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
                                            name="gender" id="{{$gender->gender_desc}}" value="{{$gender->gender_id}}"
                                            {{ $param['account']->gender_id  == $gender->gender_id ? "checked" : ""}}>
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
                            <input type="text" class="form-control" id="role" name="role"
                                value="{{$param['account']->role->role_desc}}" disabled>
                            @error('role')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 row mb-4">
                        <label for="password" class="col-4 col-form-label">@lang('lang.password'):</label>
                        <div class="col-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                value="{{$param['account']->password}}">
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
                    <button type="submit" class="btn btn-warning my-3 px-5">@lang('lang.save')</button>
                </div>
            </form>
        </div>
    </div>
    	
@endsection