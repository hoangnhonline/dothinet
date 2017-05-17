<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\District;
use App\Models\MetaData;
use Helper, File, Session, Auth;

class TagController extends Controller
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
        $district_id = isset($request->district_id) && $request->district_id != '' ? $request->district_id : 0;

        $query = Tag::where('type', $type);
        if( $name !='' ){
            $query->where('name', 'LIKE', '%'.$name.'%');
        }
        if( $district_id > 0 ){
            $query->where('district_id', '=', $district_id);
        }
        $items = $query->orderBy('id', 'desc')->paginate(50);
        $districtList = District::where('city_id', 1)->get();
        return view('backend.tag.index', compact( 'items', 'type', 'name', 'districtList', 'district_id'));
    }
    public function ajaxList(Request $request){

        $tagSelected = (array) $request->tagSelected;
        
        $str_id = $request->str_id;
        $tmpArr = explode(",", $str_id);
        $tagSelected = array_merge($tagSelected, $tmpArr);

        $type = isset($request->type) ? $request->type : 1;

        $query = Tag::where('type', $type);
        
        $tagArr = $query->orderBy('id', 'desc')->get();
        $districtList = District::where('city_id', 1)->get();

        return view('backend.tag.ajax-list', compact( 'tagArr', 'type', 'tagSelected', 'districtList'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('backend.tag.create');
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
            'name' => 'required',
            'slug' => 'required|unique:tag,slug,NULL,id,type,'.$dataArr['type'],
        ],
        [
            'name.required' => 'Bạn chưa nhập tag',
            'slug.required' => 'Bạn chưa nhập slug',
            'slug.unique' => 'Slug đã được sử dụng.',
        ]);

        $dataArr['alias'] = Helper::stripUnicode($dataArr['name']);
        
        $dataArr['created_user'] = Auth::user()->id;

        $dataArr['updated_user'] = Auth::user()->id;

        $rs = Tag::create($dataArr);
        
        $object_id = $rs->id;

        $metaArr['meta_title'] = $dataArr['meta_title'];
        $metaArr['meta_description'] = $dataArr['meta_description'];
        $metaArr['meta_keywords'] = $dataArr['meta_keywords'];
        $metaArr['custom_text'] = $dataArr['custom_text'];
        
        $rsMeta = MetaData::create( $metaArr );

        if( $rsMeta->id ){
            $modelTag = Tag::find($object_id);
            $modelTag->update(['meta_id' => $rsMeta->id]);
        }
        Session::flash('message', 'Tạo mới tag thành công');

        return redirect()->route('tag.index', [ 'type' => $dataArr['type'] ]);
    }

    public function ajaxSave(Request $request)
    {
        $dataArr = $request->all();
        
        $str_tag = $request->str_tag;

        $type = $request->type;

        $tmpArr = explode(';', $str_tag);

        if( !empty($tmpArr) ){
            foreach ($tmpArr as $tag) {
                
            $tag = trim($tag);
            if( $tag != ""){
                // check xem co chua
                $arr = Tag::where('name', '=', $tag)->where('type', $type)->first();
                if( !empty( (array) $arr)) {
                    $arrId[] = $arr->id;
                }else{
                    $rs = Tag::create(['name'=> $tag, 'type' => $type, 'slug' => str_slug($tag), 'created_user' => Auth::user()->id, 'updated_user' => Auth::user()->id]);
                    $arrId[] = $rs->id;
                }

            }
            }   
        }

        return implode(',', $arrId);

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
        $metadata = (object) [];
        $detail = Tag::find($id);
        if( $detail->meta_id > 0){
            $metadata = MetaData::find( $detail->meta_id );
        }
        $districtList = District::where('city_id', 1)->get();
        return view('backend.tag.edit', compact( 'detail', 'metadata', 'districtList'));
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
            'name' => 'required',
            'slug' => 'required|unique:tag,slug,'.$dataArr['id'].',id,type,'.$dataArr['type'],
        ],
        [
            'name.required' => 'Bạn chưa nhập tag',
            'slug.required' => 'Bạn chưa nhập slug',
            'slug.unique' => 'Slug đã được sử dụng.',
        ]);
        $dataArr['alias'] = Helper::stripUnicode($dataArr['name']);
        
        $model = Tag::find($dataArr['id']);        

        $dataArr['updated_user'] = Auth::user()->id;

        $model->update($dataArr);

        if( $dataArr['meta_id'] ){

            $metaArr['meta_title'] = $dataArr['meta_title'];
            $metaArr['meta_description'] = $dataArr['meta_description'];
            $metaArr['meta_keywords'] = $dataArr['meta_keywords'];
            $metaArr['custom_text'] = $dataArr['custom_text'];
            $metaArr['id'] = $dataArr['meta_id'];
            $modelMetaData = MetaData::find( $dataArr['meta_id'] );
            $modelMetaData->update( $metaArr );
        }

        Session::flash('message', 'Cập nhật tag thành công');

        return redirect()->route('tag.index', [ 'type' => $dataArr['type'] ]);
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
        $model = Tag::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa tag thành công');
        return redirect()->route('tag.index');
    }
}