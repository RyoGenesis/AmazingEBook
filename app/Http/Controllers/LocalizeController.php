<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizeController extends Controller
{
    //mengubah setting localization dari button
    public function setLang($id) {
        session()->put('localization', $id);
        return redirect()->back();
    }
}
