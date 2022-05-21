@extends('layout.layout')
@section('content')
    <div class="mt-3 px-md-3 px-2">
        @if ($param['carts']->count()!=0)
            <div class="table-responsive">
                <table class="table table-bordered bordered-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">@lang('lang.title')</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($param['carts'] as $cart)
                            <tr class="table-bordered">
                                <td scope="row">{{$cart->ebook->title}}</td>
                                <td>
                                    <form action="{{route('cart.delete',['id' => $cart->order_id])}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-decoration-underline bg-transparent text-blue">@lang('lang.delete')</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
            <div class="d-flex justify-content-end">
            <form action="{{route('cart.submit')}}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning px-4">@lang('lang.submit_cart')</a>
            </form>
        </div>    
        @else
            <div class="text-center"><p>@lang('lang.empty_cart')</p></div>
        @endif
    </div>	
@endsection