<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use Helper, File, Session, Auth;

class CartController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $type = isset($request->type) ? $request->type : 1;
        
        $name = isset($request->name) && $request->name != '' ? $request->name : '';
        
        $query = Cart::where('type', $type);
        if( $name !='' ){
            $query->where('name', 'LIKE', '%'.$name.'%');
        }
        $items = $query->paginate(1000);
        return view('backend.cart.index', compact( 'items', 'type', 'name'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {
        $type = $request->type ? $request->type : 1;
        return view('backend.cart.create', compact('type'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[
            'name' => 'required'            
        ],
        [
            'name.required' => 'Bạn chưa nhập tên giỏ hàng'
            
        ]);

        $dataArr['slug'] = Helper::changeFileName($dataArr['name']);  
        $dataArr['user_id'] = Auth::user()->id;

        Cart::create($dataArr);

        Session::flash('message', 'Tạo mới giỏ hàng thành công');

        return redirect()->route('cart.index', ['type' => $dataArr['type']]);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $detail = Cart::find($id);

        return view('backend.cart.edit', compact( 'detail' ));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[
            'name' => 'required'            
        ],
        [
            'name.required' => 'Bạn chưa nhập tên giỏ hàng'           
        ]);       
        
        $dataArr['slug'] = Helper::changeFileName($dataArr['name']);
        
        $model = Cart::find($dataArr['id']);        

        $model->update($dataArr);

        Session::flash('message', 'Cập nhật giỏ hàng thành công');

        return redirect()->route('cart.edit', $dataArr['id']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = Cart::find($id);
        $model->delete();

        CartProduct::where('cart_id', $id)->delete();

        // redirect
        Session::flash('message', 'Xóa giỏ hàng thành công');
        return redirect()->route('cart.index');
    }
}
