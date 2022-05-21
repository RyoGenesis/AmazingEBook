<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function home() {
        $param['ebooks'] = EBook::simplePaginate(10);

        return view('home')->with('param',$param);
    }

    public function pageSuccess() {

        return view('success');
    }

    public function pageSaved() {
        return view('saved');
    }
}
