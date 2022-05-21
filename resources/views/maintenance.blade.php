@extends('layout.layout')
@section('content')
    <div class="mt-3 px-md-3 px-2">
        <div class="table-responsive">
            <table class="table table-bordered bordered-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">@lang('lang.account')</th>
                        <th scope="col" colspan="2">@lang('lang.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($param['accounts'] as $account)
                        <tr class="table-bordered">
                            <td scope="row">{{$account->first_name}} {{$account->middle_name}} {{$account->last_name}} - {{$account->role->role_desc}}</td>
                            <td>
                                <a href="{{ url('update-role/'.$account->account_id) }}" class="text-blue">@lang('lang.update_role')</a>
                            </td>
                            <td>
                                <form action="{{route('account.delete')}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{$account->account_id}}">
                                    <button type="submit" class="btn text-decoration-underline bg-transparent text-blue">@lang('lang.delete')</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>
    </div>
    <div class="d-flex justify-content-end">
        {{$param['accounts']->withQueryString()->links()}}
    </div>	
@endsection