<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Models\RestaurantTable;

class OrderController extends Controller
{
    public function index(){
        $tables = RestaurantTable::all();
        // dd($tables);
        $dishes = Dish::orderBy('id','desc')->get();
        return view('waiter.order_form')->with(['dishes'=> $dishes, 'tables'=>$tables]);
    }

    public function orderSubmit(Request $request){
        // dd($request->name);
        $request->validate([
            'table_number' => 'required',

        ]);

        $table = $request->table_number;
        $data = array_filter($request->except('_token','table_number'));   //use array_filter Method for remove null in request.  use except('_token') to remove token.
        $dBorderId = rand();
        // dd($dBorderId);
        foreach ($data as $key => $value) {
            // dd($data);
            if ($value > 1 ) {
            //    echo($key . 'more than one');
            for ($i=1; $i <= $value; $i++) {
                // echo($key . 'inserted.');
                // $orders = new Order;
                // $orders->order_id = $dBorderId;
                // $orders->table_id =1;
                // $orders->dish_id = $key;
                // $orders->status = config('orderStatus.orderStatus.new');
                // $orders->save();
                $this->orderSaveFunction($key,$table,$dBorderId);
            }
            }else{
                // $orders = new Order;
                // $orders->order_id = $dBorderId;
                // $orders->table_id = 1;
                // $orders->dish_id = $key;
                // $orders->status = config('orderStatus.orderStatus.new');
                // $orders->save();
                $this->orderSaveFunction($key,$table,$dBorderId);

            }
        }
        return redirect('/')->with(['orderConfirmMessage'=>'Order Submitted. . . . .']);
    }

    public function orderSaveFunction ($key,$table,$dBorderId){
        $orders = new Order;
                $orders->order_id = $dBorderId;
                $orders->table_id = $table;
                $orders->dish_id = $key;
                // dd($orders->dish_id);
                $orders->status = config('orderStatus.orderStatus.new');
                $orders->save();
    }
}
