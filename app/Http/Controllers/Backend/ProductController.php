<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\EstateType;
use App\Models\Cate;
use App\Models\Color;
use App\Models\LoaiThuocTinh;
use App\Models\ThuocTinh;
use App\Models\SpThuocTinh;
use App\Models\ProductImg;
use App\Models\MetaData;
use App\Models\Compare;
use App\Models\SpTuongThich;
use App\Models\ProductPrice;
use App\Models\SpMucDich;

use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Street;
use App\Models\PriceUnit;
use App\Models\Projects;



use Helper, File, Session, Auth, Hash, URL;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {

        $arrSearch['status'] = $status = isset($request->status) ? $request->status : 1;
        $arrSearch['is_hot'] = $is_hot = isset($request->is_hot) ? $request->is_hot : null;
        $arrSearch['is_sale'] = $is_sale = isset($request->is_sale) ? $request->is_sale : null;
        $arrSearch['estate_type_id'] = $estate_type_id = isset($request->estate_type_id) ? $request->estate_type_id : null;
        $arrSearch['cate_id'] = $cate_id = isset($request->cate_id) ? $request->cate_id : null;

        $arrSearch['het_hang'] = $het_hang = isset($request->het_hang) ? $request->het_hang : null;
        $arrSearch['chua_nhap_gia'] = $chua_nhap_gia = isset($request->chua_nhap_gia) ? $request->chua_nhap_gia : null;
        $arrSearch['thieu_can_nang'] = $thieu_can_nang = isset($request->thieu_can_nang) ? $request->thieu_can_nang : null;
        $arrSearch['thieu_kich_thuoc'] = $thieu_kich_thuoc = isset($request->thieu_kich_thuoc) ? $request->thieu_kich_thuoc : null;

        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        
        $query = Product::where('product.status', $status);
        if( $is_hot ){
            $query->where('product.is_hot', $is_hot);
        }
        if( $is_sale ){
            $query->where('product.is_sale', $is_sale);
        }
        if( $estate_type_id ){
            $query->where('product.estate_type_id', $estate_type_id);
        }
        if( $cate_id ){
            $query->where('product.cate_id', $cate_id);
        }
        if( $het_hang ){
            $query->where('product.so_luong_ton', 0);
        }
        if( $chua_nhap_gia ){
            $query->where('product.price', 0);
        }
        if( $thieu_can_nang ){
            $query->where('product.can_nang', 0);
        }
        if( $thieu_kich_thuoc ){
            $query->where('product.chieu_dai', 0);
            $query->orWhere('product.chieu_rong', 0);
            $query->orWhere('product.chieu_cao', 0);
        }
        if( $name != ''){
            $query->where('product.name', 'LIKE', '%'.$name.'%');
            $query->orWhere('name_extend', 'LIKE', '%'.$name.'%');
        }
        //$query->join('users', 'users.id', '=', 'product.created_user');
        $query->join('city', 'city.id', '=', 'product.city_id');        
        $query->orderBy('product.id', 'desc');   
        $items = $query->paginate(50);
        $cityList = City::all();  
        $districtList = District::all();

        return view('backend.product.index', compact( 'items', 'arrSearch', 'cityList', 'districtList'));
    }
    public function short(Request $request)
    {
        
        $arrSearch['status'] = $status = isset($request->status) ? $request->status : 1;
        $arrSearch['estate_type_id'] = $estate_type_id = isset($request->estate_type_id) ? $request->estate_type_id : null;
        $arrSearch['cate_id'] = $cate_id = isset($request->cate_id) ? $request->cate_id : null;
        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        
        $query = Product::where('product.status', $status);
        if( $estate_type_id ){
            $query->where('product.estate_type_id', $estate_type_id);
        }
        if( $cate_id ){
            $query->where('product.cate_id', $cate_id);
        }
        if( $name != ''){
            $query->where('product.name', 'LIKE', '%'.$name.'%');
            $query->orWhere('name_extend', 'LIKE', '%'.$name.'%');
        }        
        $query->orderBy('product.id', 'desc');
        $items = $query->select(['product.*','product.id as product_id' , 'product.created_at as time_created'])
        ->paginate(50);

        $estateTypeArr = EstateType::all();  
        if( $estate_type_id ){
            $cateArr = Cate::where('estate_type_id', $estate_type_id)->orderBy('display_order', 'desc')->get();
        }else{
            $cateArr = (object) [];
        }

        return view('backend.product.short', compact( 'items', 'arrSearch', 'estateTypeArr', 'cateArr'));
    }
    public function spTuongThich(Request $request){
        
        $id = $request->id;
        
        $detail = Product::find($id);

        $estateTypeArr = EstateType::all();  
        
        $tmpArr = SpTuongThich::where('sp_1', $id)->get();
        
        $spSelected = $productArr = [];
        $str_sp_bo_mach_chinh = $str_sp_bo_vi_xu_ly = $str_sp_card_man_hinh = $str_sp_bo_nho = $str_sp_nguon = $str_sp_case = "";
        if( $tmpArr->count() > 0){
            foreach ($tmpArr as $value) {
                $spSelected[$value->cate_id][] = $value->sp_2;
                $productArr[$value->sp_2] = Product::find($value->sp_2);
                if($value->cate_id == 31){
                    $str_sp_bo_mach_chinh .= $value->sp_2.",";
                }
                if($value->cate_id == 32){
                    $str_sp_bo_vi_xu_ly .= $value->sp_2.",";
                }
                if($value->cate_id == 35){
                    $str_sp_bo_nho .= $value->sp_2.",";
                }
                if($value->cate_id == 85){
                    $str_sp_card_man_hinh .= $value->sp_2.",";
                }
                if($value->cate_id == 85){
                    $str_sp_card_man_hinh .= $value->sp_2.",";
                }
                if($value->cate_id == 33){
                    $str_sp_nguon .= $value->sp_2.",";
                }
                if($value->cate_id == 89){
                    $str_sp_case .= $value->sp_2.",";
                }
            }
        }

        $cateArr = Cate::where('estate_type_id', 7)->orderBy('display_order', 'desc')->get();
        
        return view('backend.product.tuong-thich', compact( 'detail', 'estateTypeArr',  'spSelected', 'productArr', 'str_sp_bo_mach_chinh','str_sp_bo_vi_xu_ly', 'str_sp_card_man_hinh', 'str_sp_bo_nho', 'str_sp_case', 'str_sp_nguon'));   
    }
    public function ajaxSearch(Request $request){    
        $search_type = $request->search_type;
        $arrSearch['estate_type_id'] = $estate_type_id = isset($request->estate_type_id) ? $request->estate_type_id : -1;
        $arrSearch['cate_id'] = $cate_id = isset($request->cate_id) ? $request->cate_id : -1;
        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        
        $query = Product::whereRaw('1');
        
        if( $estate_type_id ){
            $query->where('product.estate_type_id', $estate_type_id);
        }
        if( $cate_id ){
            $query->where('product.cate_id', $cate_id);
        }
        if( $name != ''){
            $query->where('product.name', 'LIKE', '%'.$name.'%');
            $query->orWhere('name_extend', 'LIKE', '%'.$name.'%');
        }
        $query->join('users', 'users.id', '=', 'product.created_user');
        $query->join('estate_type', 'estate_type.id', '=', 'product.estate_type_id');
        $query->join('cate', 'cate.id', '=', 'product.cate_id');
        $query->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id');        
        $query->orderBy('product.id', 'desc');
        $items = $query->select(['product_img.image_url','product.*','product.id as product_id', 'full_name' , 'product.created_at as time_created', 'users.full_name', 'estate_type.name as ten_loai', 'cate.name as ten_cate'])
        ->paginate(1000);

        $estateTypeArr = EstateType::all();  
        

        return view('backend.product.content-search', compact( 'items', 'arrSearch', 'estateTypeArr',  'search_type'));
    }

    public function ajaxSearchTuongThich(Request $request){    
        $search_type = $request->search_type;
        $arrSearch['estate_type_id'] = $estate_type_id = 7;
        $arrSearch['cate_id'] = $cate_id = isset($request->cate_id) ? $request->cate_id : -1;
        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        
        $query = Product::whereRaw('1');
        
        
        $query->where('product.estate_type_id', 7);
        
        if( $cate_id ){
            $query->where('product.cate_id', $cate_id);
        }
        if( $name != ''){
            $query->where('product.name', 'LIKE', '%'.$name.'%');
            $query->orWhere('name_extend', 'LIKE', '%'.$name.'%');
        }
        $query->join('users', 'users.id', '=', 'product.created_user');
        $query->join('estate_type', 'estate_type.id', '=', 'product.estate_type_id');
        $query->join('cate', 'cate.id', '=', 'product.cate_id');
        $query->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id');        
        $query->orderBy('product.id', 'desc');
        $items = $query->select(['product_img.image_url','product.*','product.id as product_id', 'full_name' , 'product.created_at as time_created', 'users.full_name', 'estate_type.name as ten_loai', 'cate.name as ten_cate'])
        ->paginate(1000);

        $estateTypeArr = EstateType::all();  
        if( $estate_type_id ){
            $cateArr = Cate::where('estate_type_id', $estate_type_id)->orderBy('display_order', 'desc')->get();
        }else{
            $cateArr = (object) [];
        }

        return view('backend.product.tuong-thich.content-search-tuong-thich', compact( 'items', 'arrSearch', 'estateTypeArr',  'search_type', 'cate_id'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {
        $estate_type_id = $request->estate_type_id ? $request->estate_type_id : null;
        $cate_id = $request->cate_id ? $request->cate_id : null;
        $cateArr = $loaiThuocTinhArr = (object) [];
        $thuocTinhArr = [];
        $estateTypeArr = EstateType::all();
        
        if( $estate_type_id ){
            
            $cateArr = Cate::where('estate_type_id', $estate_type_id)->select('id', 'name')->orderBy('display_order', 'desc')->get();
            
            $loaiThuocTinhArr = LoaiThuocTinh::where('estate_type_id', $estate_type_id)->orderBy('display_order')->get();

            if( $loaiThuocTinhArr->count() > 0){
                foreach ($loaiThuocTinhArr as $value) {

                    $thuocTinhArr[$value->id]['id'] = $value->id;
                    $thuocTinhArr[$value->id]['name'] = $value->name;

                    $thuocTinhArr[$value->id]['child'] = ThuocTinh::where('loai_thuoc_tinh_id', $value->id)->select('id', 'name')->orderBy('display_order')->get()->toArray();
                }
                
            }
        }        
        $mucDichArr = [];
        return view('backend.product.create', compact('estateTypeArr',   'estate_type_id', 'thuocTinhArr', 'cate_id', 'mucDichArr'));
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
            'slug' => 'required' ,
            'price' => 'required|numeric',
            'so_luong_ton' => 'required|numeric',
            'can_nang' => 'required|numeric',
            'chieu_dai' => 'required|numeric',
            'chieu_rong' => 'required|numeric',
            'chieu_cao' => 'required|numeric',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'slug.required' => 'Bạn chưa nhập slug',
            'price.numeric' => 'Vui lòng nhập giá hợp lệ',
            'price.required' => 'Bạn chưa nhập giá',
            'so_luong_ton.required' => 'Bạn chưa nhập số lượng tồn',
            'so_luong_ton.numeric' => 'Vui lòng nhập số lượng tồn hợp lệ',
            'can_nang.required' => 'Bạn chưa nhập cân nặng',
            'can_nang.numeric' => 'Vui lòng nhập cân nặng hợp lệ',
            'chieu_dai.required' => 'Bạn chưa nhập chiều dài',
            'chieu_dai.numeric' => 'Vui lòng nhập chiều dài hợp lệ',
            'chieu_rong.required' => 'Bạn chưa nhập chiều rộng',
            'chieu_rong.numeric' => 'Vui lòng nhập chiều rộng hợp lệ',
            'chieu_cao.required' => 'Bạn chưa nhập chiều cao',
            'chieu_cao.numeric' => 'Vui lòng nhập chiều cao hợp lệ',
        ]);

        $dataArr['is_primary'] = isset($dataArr['is_primary']) ? 1 : 0;
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;
        $dataArr['is_sale'] = isset($dataArr['is_sale']) ? 1 : 0;        
        
        $dataArr['alias'] = Helper::stripUnicode($dataArr['name']);
        $dataArr['slug'] = str_replace(".", "-", $dataArr['slug']);
        $dataArr['slug'] = str_replace("(", "-", $dataArr['slug']);
        $dataArr['slug'] = str_replace(")", "", $dataArr['slug']);
        $dataArr['alias_extend'] = Helper::stripUnicode($dataArr['name_extend']);

        $dataArr['sp_phukien'] = rtrim( $dataArr['str_sp_phukien'], ',');
        $dataArr['sp_sosanh'] = rtrim( $dataArr['str_sp_sosanh'], ',');
        $dataArr['sp_tuongtu'] = rtrim( $dataArr['str_sp_tuongtu'], ',');
        
        $dataArr['status'] = 1;

        $dataArr['created_user'] = Auth::user()->id;

        $dataArr['updated_user'] = Auth::user()->id;

        if($dataArr['image_pro'] && $dataArr['pro_name']){
            
            $tmp = explode('/', $dataArr['image_pro']);

            if(!is_dir('uploads/'.date('Y/m/d'))){
                mkdir('uploads/'.date('Y/m/d'), 0777, true);
            }

            $destionation = date('Y/m/d'). '/'. end($tmp);
            
            File::move(config('icho.upload_path').$dataArr['image_pro'], config('icho.upload_path').$destionation);
            
            $dataArr['image_pro'] = $destionation;
        }  

        $rs = Product::create($dataArr);

        $product_id = $rs->id;

        if(!empty($dataArr['no_from'])){
            foreach($dataArr['no_from'] as $no => $from){
                if($dataArr['no_to'][$no] > 0 && $dataArr['price_multi'][$no] > 0){
                    $d['no_from'] = $from;
                    $d['no_to'] = $dataArr['no_to'][$no];
                    $d['price'] = $dataArr['price_multi'][$no];
                    $d['product_id'] = $product_id;
                    ProductPrice::create($d);
                }
            }
        }
        //muc_dich
        $mucDichArr = $request->muc_dich;
        SpMucDich::where('product_id', $product_id)->delete();
        if(!empty($mucDichArr)){
            foreach ($mucDichArr as $muc_dich) {
                SpMucDich::create(['product_id' => $product_id, 'muc_dich' => $muc_dich]);
            }
        }

        $this->storeThuocTinh( $product_id, $dataArr);

        $this->storeImage( $product_id, $dataArr);
        $this->storeMeta($product_id, 0, $dataArr);
        Session::flash('message', 'Tạo mới sản phẩm thành công');

        return redirect()->route('product.index', ['estate_type_id' => $dataArr['estate_type_id'], 'cate_id' => $dataArr['cate_id']]);
    }

    public function storeMeta( $id, $meta_id, $dataArr ){
       
        $arrData = ['title' => $dataArr['meta_title'], 'description' => $dataArr['meta_description'], 'keywords'=> $dataArr['meta_keywords'], 'custom_text' => $dataArr['custom_text'], 'updated_user' => Auth::user()->id];
        if( $meta_id == 0){
            $arrData['created_user'] = Auth::user()->id;
            //var_dump(MetaData::create( $arrData ));die;
            $rs = MetaData::create( $arrData );
            $meta_id = $rs->id;
            //var_dump($meta_id);die;
            $modelSp = Product::find( $id );
            $modelSp->meta_id = $meta_id;
            $modelSp->save();
        }else {
            $model = MetaData::find($meta_id);           
            $model->update( $arrData );
        }              
    }
    public function storeThuocTinh($id, $dataArr){
        
        SpThuocTinh::where('product_id', $id)->delete();

        if( !empty($dataArr['thuoc_tinh'])){
            foreach( $dataArr['thuoc_tinh'] as $k => $value){
                if( $value == ""){
                    unset( $dataArr['thuoc_tinh'][$k]);
                }
            }
            
            SpThuocTinh::create(['product_id' => $id, 'thuoc_tinh' => json_encode($dataArr['thuoc_tinh'])]);
        }
    }

    public function storeImage($id, $dataArr){        
        //process old image
        $imageIdArr = isset($dataArr['image_id']) ? $dataArr['image_id'] : [];
        $hinhXoaArr = ProductImg::where('product_id', $id)->whereNotIn('id', $imageIdArr)->lists('id');
        if( $hinhXoaArr )
        {
            foreach ($hinhXoaArr as $image_id_xoa) {
                $model = ProductImg::find($image_id_xoa);
                $urlXoa = config('icho.upload_path')."/".$model->image_url;
                if(is_file($urlXoa)){
                    unlink($urlXoa);
                }
                $model->delete();
            }
        }       

        //process new image
        if( isset( $dataArr['thumbnail_id'])){
            $thumbnail_id = $dataArr['thumbnail_id'];

            $imageArr = []; 

            if( !empty( $dataArr['image_tmp_url'] )){

                foreach ($dataArr['image_tmp_url'] as $k => $image_url) {

                    if( $image_url && $dataArr['image_tmp_name'][$k] ){

                        $tmp = explode('/', $image_url);

                        if(!is_dir('uploads/'.date('Y/m/d'))){
                            mkdir('uploads/'.date('Y/m/d'), 0777, true);
                        }

                        $destionation = date('Y/m/d'). '/'. end($tmp);
                        
                        File::move(config('icho.upload_path').$image_url, config('icho.upload_path').$destionation);

                        $imageArr['name'][] = $destionation;

                        $imageArr['is_thumbnail'][] = $dataArr['thumbnail_id'] == $image_url  ? 1 : 0;
                    }
                }
            }
            if( !empty($imageArr['name']) ){
                foreach ($imageArr['name'] as $key => $name) {
                    $rs = ProductImg::create(['product_id' => $id, 'image_url' => $name, 'display_order' => 1]);                
                    $image_id = $rs->id;
                    if( $imageArr['is_thumbnail'][$key] == 1){
                        $thumbnail_id = $image_id;
                    }
                }
            }
            $model = Product::find( $id );
            $model->thumbnail_id = $thumbnail_id;
            $model->save();
        }
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
        $thuocTinhArr = $phuKienArr = $soSanhArr = $tuongTuArr = [];
        $hinhArr = (object) [];
        $detail = Product::find($id);

        $hinhArr = ProductImg::where('product_id', $id)->lists('image_url', 'id');     
        $estateTypeArr = EstateType::all();
        
        $estate_type_id = $detail->estate_type_id;             
        
       
        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }               
            
        return view('backend.product.edit', compact( 'detail', 'hinhArr', 'estateTypeArr',  'meta'));
    }
    public function ajaxDetail(Request $request)
    {       
        $id = $request->id;
        $detail = Product::find($id);
        return view('backend.product.ajax-detail', compact( 'detail' ));
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
            'slug' => 'required',
            'price' => 'required|numeric',
            'so_luong_ton' => 'required|numeric',
            'can_nang' => 'required|numeric',
            'chieu_dai' => 'required|numeric',
            'chieu_rong' => 'required|numeric',
            'chieu_cao' => 'required|numeric',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'slug.required' => 'Bạn chưa nhập slug',
            'price.numeric' => 'Vui lòng nhập giá hợp lệ',
            'price.required' => 'Bạn chưa nhập giá',
            'so_luong_ton.required' => 'Bạn chưa nhập số lượng tồn',
            'so_luong_ton.numeric' => 'Vui lòng nhập số lượng tồn hợp lệ',
            'can_nang.required' => 'Bạn chưa nhập cân nặng',
            'can_nang.numeric' => 'Vui lòng nhập cân nặng hợp lệ',
            'chieu_dai.required' => 'Bạn chưa nhập chiều dài',
            'chieu_dai.numeric' => 'Vui lòng nhập chiều dài hợp lệ',
            'chieu_rong.required' => 'Bạn chưa nhập chiều rộng',
            'chieu_rong.numeric' => 'Vui lòng nhập chiều rộng hợp lệ',
            'chieu_cao.required' => 'Bạn chưa nhập chiều cao',
            'chieu_cao.numeric' => 'Vui lòng nhập chiều cao hợp lệ',
        ]);

        $dataArr['is_primary'] = isset($dataArr['is_primary']) ? 1 : 0;
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;
        $dataArr['is_sale'] = isset($dataArr['is_sale']) ? 1 : 0;                
        $dataArr['slug'] = str_replace(".", "-", $dataArr['slug']);
        $dataArr['slug'] = str_replace("(", "-", $dataArr['slug']);
        $dataArr['slug'] = str_replace(")", "", $dataArr['slug']);
        $dataArr['alias'] = Helper::stripUnicode($dataArr['name']);

        $dataArr['alias_extend'] = Helper::stripUnicode($dataArr['name_extend']);

        $dataArr['sp_phukien'] = rtrim( $dataArr['str_sp_phukien'], ',');
        $soSanhArr = isset($dataArr['sp_sosanh']) ? $dataArr['sp_sosanh'] : [];        
        $dataArr['sp_tuongtu'] = rtrim( $dataArr['str_sp_tuongtu'], ',');

        $dataArr['updated_user'] = Auth::user()->id;
        //echo "<pre>";
        //print_r($dataArr);die;
        if($dataArr['image_pro'] && $dataArr['pro_name']){
            
            $tmp = explode('/', $dataArr['image_pro']);

            if(!is_dir('uploads/'.date('Y/m/d'))){
                mkdir('uploads/'.date('Y/m/d'), 0777, true);
            }

            $destionation = date('Y/m/d'). '/'. end($tmp);
            
            File::move(config('icho.upload_path').$dataArr['image_pro'], config('icho.upload_path').$destionation);
            
            $dataArr['image_pro'] = $destionation;
        }  
        $model = Product::find($dataArr['id']);

        $model->update($dataArr);
        
        $product_id = $dataArr['id'];
        ProductPrice::where('product_id', $product_id)->delete();
        if(!empty($dataArr['no_from'])){
            foreach($dataArr['no_from'] as $no => $from){
                if($dataArr['no_to'][$no] > 0 && $dataArr['price_multi'][$no] > 0){
                    $d['no_from'] = $from;
                    $d['no_to'] = $dataArr['no_to'][$no];
                    $d['price'] = $dataArr['price_multi'][$no];
                    $d['product_id'] = $product_id;
                    ProductPrice::create($d);
                }
            }
        }
        //muc_dich
        $mucDichArr = $request->muc_dich;
        SpMucDich::where('product_id', $product_id)->delete();
        if(!empty($mucDichArr)){
            foreach ($mucDichArr as $muc_dich) {
                SpMucDich::create(['product_id' => $product_id, 'muc_dich' => $muc_dich]);
            }
        }

        $this->storeThuocTinh( $product_id, $dataArr);

        $this->storeMeta( $product_id, $dataArr['meta_id'], $dataArr);
        $this->storeImage( $product_id, $dataArr);
        $this->storeSoSanh( $product_id, $soSanhArr);

        Session::flash('message', 'Chỉnh sửa sản phẩm thành công');

        return redirect()->route('product.edit', $product_id);
        
    }
    public function ajaxSaveInfo(Request $request){
        
        $dataArr = $request->all();

        $dataArr['alias'] = Helper::stripUnicode($dataArr['name']);
        
        $dataArr['updated_user'] = Auth::user()->id;
        
        $model = Product::find($dataArr['id']);

        $model->update($dataArr);
        
        $product_id = $dataArr['id'];        

        Session::flash('message', 'Chỉnh sửa sản phẩm thành công');

    }
    public function storeSoSanh($sp_1, $soSanhArr){
        Compare::where('sp_1', $sp_1)->delete();              
        Compare::where('sp_2', $sp_1)->delete();  
        if( !empty($soSanhArr)){
            foreach( $soSanhArr as $sp_2){
                if( $sp_2 > 0){
                    $check1 = Compare::where('sp_1', $sp_1)->where('sp_2', $sp_2)->first();
                    $check2 = Compare::where('sp_1', $sp_2)->where('sp_2', $sp_1)->first();
                    if( !$check1 && !$check2){
                        Compare::create(['sp_1' => $sp_1, 'sp_2' => $sp_2]);
                    }
                }
            }
        }
        
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
        $model = Product::find($id);        
        $model->delete();
        ProductImg::where('product_id', $id)->delete();
        SpMucDich::where('product_id', $id)->delete();
        SpThuocTinh::where('product_id', $id)->delete();
        SpTuongThich::where('sp_1', $id)->delete();
        SpTuongThich::where('sp_2', $id)->delete();
        // redirect
        Session::flash('message', 'Xóa sản phẩm thành công');
        
        return redirect(URL::previous());//->route('product.short');
        
    }
}
