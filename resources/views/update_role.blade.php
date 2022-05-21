@extends('layout.layout')
@section('content')
    <div>
        <p class="text-decoration-underline">{{$param['account']->first_name}} {{$param['account']->middle_name}} {{$param['account']->last_name}}</p>
        <form action="{{ route('account.update')}}" method="POST" class="mt-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-4">
                <input type="hidden" name="account_id" value="{{$param['account']->account_id}}">
                <label for="role" class="col-2 col-form-label">@lang('lang.role'):</label>
                <div class="col-2">
                    <select class="form-select form-select-sm" name="role" id="role">
                        @foreach ($param['roles'] as $role)
                            <option value="{{$role->role_id}}"
                                {{ $param['account']->role_id  == $role->role_id ? "selected" : ""}} >{{$role->role_desc}}</option>   
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-warning my-3 px-5">@lang('lang.save')</button>
        </form>
    </div>
    	
@endsection