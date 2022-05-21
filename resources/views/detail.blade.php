@extends('layout.layout')
@section('content')	
    <div class="my-3 px-5 mx-5">
        <h3 class="text-decoration-underline mb-4">@lang('lang.ebook_detail')</h3>

        <div class="row mb-2">
            <p class="col-3">@lang('lang.title'):</p>
            <p class="col-8">{{$param['ebook']->title}}</p>
        </div>

        <div class="row mb-2">
            <p class="col-3">@lang('lang.author'):</p>
            <p class="col-8">{{$param['ebook']->author}}</p>
        </div>

        <div class="row mb-2">
            <p class="col-3">@lang('lang.description'):</p>
            <p class="col-8">{{$param['ebook']->description}}</p>
        </div>

        <div class="d-flex justify-content-end">
            <form action="{{route('rent',['id' => $param['ebook']->ebook_id])}}" method="POST" >
                @csrf
                <button type="submit" class="btn btn-warning px-4">@lang('lang.rent')</a>
            </form>
        </div>
    </div>
@endsection