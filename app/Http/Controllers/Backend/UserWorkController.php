<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesCate;
use App\Models\Tag;
use App\Models\TagObjects;
use App\Models\Articles;
use Helper, File, Session, Auth;

class ArticlesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $items = UserWork::orderBy('id', 'desc')->paginate(20);
        
        return view('backend.user-work.index', compact( 'items' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {        
    
        return view('backend.user-work.create');
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
            'work_content' => 'required',
            'work_date' => 'required',
        ],
        [            
            'work_content.required' => 'Bạn chưa nhập nội dung',            
            'work_date.required' => 'Bạn chưa nhập ngày làm việc'
        ]);               
        
        $rs = UserWork::create($dataArr);      

        Session::flash('message', 'Tạo mới công việc thành công');

        return redirect()->route('user-work.index',['cate_id' => $dataArr['cate_id']]);
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
       
        $detail = UserWork::find($id);      

        return view('backend.user-work.edit', compact('detail'));
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
            'work_content' => 'required',
            'work_date' => 'required',
        ],
        [            
            'work_content.required' => 'Bạn chưa nhập nội dung',            
            'work_date.required' => 'Bạn chưa nhập ngày làm việc'
        ]);               
        
        $model = UserWork::find($dataArr['id']);

        $model->update($dataArr);
        
        Session::flash('message', 'Cập nhật công việc thành công');        

        return redirect()->route('user-work.edit', $dataArr['id']);
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
        $model = UserWork::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa công việc thành công');
        return redirect()->route('user-work.index');
    }
}
