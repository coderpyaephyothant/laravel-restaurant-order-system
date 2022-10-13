<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DishCreateRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishesData = Dish::all();
        // return view('kitchen.dish');
        return view('kitchen.dish')->with(['dishes'=>$dishesData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.dishCreate')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dish();
        // dd($dish);
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        $imageName = date('YmdHis')."."."developerpyaephyothant".request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path('images'),$imageName);
        $dish->image = $imageName;
        $dish->save();
        return redirect('dishes')->with(['dishCreated'=>'Successfully Created. . . .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Dish $dish)  //Route Model Binding
    {
        // dd($dish);
        // dd($dish->image);

        $categories = Category::all();
        return view('kitchen.dishEdit')->with(['dishes'=>$dish, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish){
        // dd($request->all());
        //customize validation for name and category
            $request->validate([
                'name' => 'required',
                'category' => 'required',
            ]);

            $dish->name = $request->name;
            $dish->category_id = $request->category;
            if($request->dish_image){
                $oldImg = $dish->image;
                // dd($oldImg);
                if(File::exists(public_path().'/images/'.$oldImg)){
                    File::delete(public_path().'/images/'.$oldImg);
                }
                $uniqueId = uniqid();
                // dd($uniqueId);
                $imageName = $uniqueId."."."developerppt".".".request()->dish_image->getClientOriginalExtension();
                // dd($imageName);
                request()->dish_image->move(public_path('images'),$imageName);
                $dish->image = $imageName;
            };
                $dish->save();
                return redirect('dishes')->with(['dishCreated'=>'Successfully Updatd. . . .']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('dishes')->with(['dishCreated'=>'Successfully Deleted. . . .']);

    }
}
