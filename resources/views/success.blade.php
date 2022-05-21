@extends('layout.layout')
@section('content')
    <div class="my-3 px-5">
        <div class="text-center circle p-5 mx-auto">
            <h3>@lang('lang.success')</h3>
            <a href="{{route('home')}}">@lang('lang.click_home')</a>
        </div>
    </div>
@endsection