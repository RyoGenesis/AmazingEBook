<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Support\Facades\App;

class EBookController extends Controller
{
    //
    public function detailBookIndex($id){
        $param['ebook'] = EBook::where('ebook_id',$id)->first();
        return view('detail')->with('param',$param);
    }
}
