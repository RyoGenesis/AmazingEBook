<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $account = Auth::user();
        $param['carts'] = Order::where("account_id","=",$account->account_id)->get();
        return view("cart")->with('param',$param);
    }

    public function rent(Request $request){
        $account = Auth::user();

        $ebook = EBook::find($request->id);
        $date = Carbon::now();
        $orderCart = new Order();
        $orderCart->order_date = $date;
        $orderCart->account_id = $account->account_id;
        $orderCart->ebook_id = $ebook->ebook_id;
        $orderCart->save();
        return redirect()->route('cart.index');
    }

    public function submitCart() {
        //empty cart/order
        Order::where('account_id',Auth::user()->account_id)->delete();
        return redirect()->route('success');
    }

    public function deleteCart(Request $request) {
        $cart = Order::find($request->id);
        if($cart == null) 
            return redirect()->back();

        $cart->delete();
        return redirect()->back();
    }
}
