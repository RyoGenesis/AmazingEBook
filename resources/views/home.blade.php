@extends('layout.layout')
@section('content')
    <div class="mt-3 px-md-5 px-2">
        <div class="table-responsive">
            <table class="table table-bordered bordered-dark">
                <thead>
                    <tr class="text-center">
                        <th scope="col">@lang('lang.author')</th>
                        <th scope="col">@lang('lang.title')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($param['ebooks'] as $book)
                        <tr class="table-bordered">
                            <td>{{$book->author}}</td>
                            <td scope="row"><a class="text-decoration-none" href="{{ url('detail-book/'.$book->ebook_id) }}">{{$book->title}}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>
    </div>
    <div class="d-flex justify-content-end">
        {{$param['ebooks']->withQueryString()->links()}}
    </div>	
@endsection
