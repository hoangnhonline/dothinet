<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserWork;
use App\Models\Account;

use Helper, File, Session, Auth;

class UserWorkController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $s['status'] = $status = isset($request->status) ? $request->status : -1;
        $s['created_user'] = $created_user = isset($request->created_user) ? $request->created_user : -1;
        $s['date_from'] = $date_from = isset($request->date_from) && $request->date_from !='' ? $request->date_from : '';
        $s['date_to'] = $date_to = isset($request->date_to) && $request->date_to !='' ? $request->date_to : date('d-m-Y');               

        $query = UserWork::whereRaw('1');
        if( $status > -1){
            $query->where('status', $status);
        }
        if( $date_from ){
            $dateFromFormat = date('Y-m-d', strtotime($date_from));
            $query->whereRaw("work_date >= '".$dateFromFormat."'");
        }
        if( $date_to ){
            $dateToFormat = date('Y-m-d', strtotime($date_to));
            $query->whereRaw("work_date <= '".$dateToFormat."'");
        }
        $userList = (object) [];
        if(Auth::user()->role == 1 ){
            $query->where('created_user', Auth::user()->id);
        }elseif(Auth::user()->role == 2){ // leader
            $query->where('leader_id', Auth::user()->id);
            $userList = Account::where(['leader_id' => Auth::user()->id])->get();
            if( $created_user > -1){
                $query->where('created_user', $created_user);
            }

        }
        
        $items = $query->orderBy('user_work.work_date', 'DESC')->paginate(20);

        return view('backend.user-work.index', compact( 'items', 's', 'userList'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {        
        $date_current = date('d-m-Y');
        return view('backend.user-work.create', compact('date_current'));
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
        $user_id = Auth::user()->id;
        $detailUser = Account::find($user_id);
        $this->validate($request,[            
            'work_content' => 'required',
            'work_date' => 'required',
        ],
        [            
            'work_content.required' => 'Bạn chưa nhập nội dung',            
            'work_date.required' => 'Bạn chưa nhập ngày làm việc'
        ]);               
        $dataArr['work_date'] = date('Y-m-d', strtotime($dataArr['work_date']));
        
        $dataArr['created_user'] = $dataArr['updated_user'] = $user_id;

        $dataArr['leader_id'] = $detailUser->leader_id;        

        $rs = UserWork::create($dataArr);      

        Session::flash('message', 'Tạo mới công việc thành công');

        return redirect()->route('user-work.index');
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
        $user_id = $detail->created_user;
        $detailUser = Account::find($user_id);
        return view('backend.user-work.edit', compact('detail', 'detailUser'));
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
        if(Auth::user()->role == 1){
            $this->validate($request,[            
                'work_content' => 'required',
                'work_date' => 'required',
            ],
            [            
                'work_content.required' => 'Bạn chưa nhập nội dung',            
                'work_date.required' => 'Bạn chưa nhập ngày làm việc'
            ]);               
        }else{
            $this->validate($request,[            
                'leader_comment' => 'required'                
            ],
            [            
                'leader_comment.required' => 'Bạn chưa nhập nhận xét'
            ]);               
        }   

        $dataArr['updated_user'] = Auth::user()->id;

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
