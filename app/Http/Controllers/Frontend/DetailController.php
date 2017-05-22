<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\District;
use App\Models\Ward;
use App\Models\Street;
use App\Models\Project;
use App\Models\EstateType;
use App\Models\MetaData;
use App\Models\ProductImg;
use App\Models\Tag;
use App\Models\TagObjects;
use App\Models\Direction;
use App\Models\PriceUnit;
use App\Models\Articles;


use Helper, File, Session, Auth, Image;

class DetailController extends Controller
{
    
    public static $loaiSp = []; 
    public static $loaiSpArrKey = [];    

    public function __construct(){
        
       

    }
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {   
        $spThuocTinhArr = $productArr = [];
        $slug = $request->slug;
        $detail = Product::where('slug', $slug)->where('estate_type_id', '>', 0)->first();
        if(!$detail){
            return redirect()->route('home');
        }
        $rsLoai = EstateType::find( $detail->estate_type_id );

        $hinhArr = ProductImg::where('product_id', $detail->id)->get()->toArray();

        $district_id = $detail->district_id;
        if( $detail->meta_id > 0){
           $meta = MetaData::find( $detail->meta_id )->toArray();
           $seo['title'] = $meta['title'] != '' ? $meta['title'] : $detail->title;
           $seo['description'] = $meta['description'] != '' ? $meta['description'] : $detail->title;
           $seo['keywords'] = $meta['keywords'] != '' ? $meta['keywords'] : $detail->title;
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->title;
        }               
        
        if($detail->thumbnail_id > 0){
            $socialImage = ProductImg::find($detail->thumbnail_id)->image_url;
        }

        $otherList = Product::where('product.slug', '<>', '')
                    ->where('product.type', $detail->type)
                    ->where('product.district_id', $detail->district_id)
                    ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')            
                    ->join('estate_type', 'estate_type.id', '=','product.estate_type_id')      
                    ->select('product_img.image_url as image_urls', 'product.*', 'estate_type.slug as slug_loai')
                    ->where('product_img.image_url', '<>', '')    
                    ->where('product.id', '<>', $detail->id)                                     
                    ->orderBy('product.cart_status', 'asc')
                    ->orderBy('product.id', 'desc')->limit(6)->get();

        $tagSelected = Product::getListTag($detail->id);        
        return view('frontend.detail.index', compact('detail', 'rsLoai', 'hinhArr', 'productArr', 'seo', 'socialImage', 'otherList', 'tagSelected'));
    }
    public function tagDetail(Request $request){
        $slug = $request->slug;
        $detail = Tag::where('slug', $slug)->first();
        if($detail->type == 1){ // product           
            $productList = (object)[];
            $listId = [];
            $listId = TagObjects::where(['type' => 1, 'tag_id' => $detail->id])->lists('object_id');
            if($listId){
                $listId = $listId->toArray();
            }
            if(!empty($listId)){
            $query = Product::where('product.status', 1)            
                ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id') 
                ->join('estate_type', 'estate_type.id', '=','product.estate_type_id')
                ->select('product_img.image_url as image_urls', 'product.*', 'estate_type.slug as slug_loai')
                ->where('product_img.image_url', '<>', '')
                ->whereIn('product.id', $listId)
                ->orderBy('product.cart_status', 'asc')
                ->orderBy('product.id', 'desc');
                $productList  = $query->limit(36)->get();

            }
            $seo['title'] = $seo['description'] = $seo['keywords'] = 'Tag - '. $detail->name;
            
            return view('frontend.cate.tag', compact('productList', 'socialImage', 'seo', 'detail'));
        }elseif($detail->type == 2){ // articles
            $articlesArr = (object)[];
            $listId = [];
            $listId = TagObjects::where(['type' => 2, 'tag_id' => $detail->id])->lists('object_id');
            if($listId){
                $listId = $listId->toArray();
            }
            if(!empty($listId)){
                $articlesArr = Articles::whereIn('id', $listId)->orderBy('id', 'desc')->where('cate_id', '<>', 999)->paginate(20);
            }  

            $seo['title'] = $seo['description'] = $seo['keywords'] = 'Tag - '. $detail->name;
                  
            return view('frontend.news.tag', compact('title', 'articlesArr', 'seo', 'socialImage', 'detail'));
        }
    }
    public function ajaxTab(Request $request){
        $table = $request->type ? $request->type : 'category';
        $id = $request->id;

        $arr = Film::getFilmHomeTab( $table, $id);

        return view('frontend.index.ajax-tab', compact('arr'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {

        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        
        $layout_name = "main-category";
        
        $page_name = "page-category";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];

        $tu_khoa = $request->k;
        
        $is_search = 1;

        $moviesArr = Film::where('alias', 'LIKE', '%'.$tu_khoa.'%')->orderBy('id', 'desc')->paginate(20);

        return view('frontend.cate', compact('settingArr', 'moviesArr', 'tu_khoa',  'is_search', 'layout_name', 'page_name' ));
    }

    public function cate(Request $request)
    {

        $productArr = [];
        $slugEstateType = $request->slugEstateType;
        $slug = $request->slug;
        $rs = EstateType::where('slug', $slugEstateType)->first();
        $estate_type_id = $rs->id;
        $rsCate = Cate::where(['estate_type_id' => $estate_type_id, 'slug' => $slug])->first();
        $cate_id = $rsCate->id;

        $cateArr = Cate::where('status', 1)->where('estate_type_id', $estate_type_id)->get();

        
        $productArr = Product::where('cate_id', $rsCate->id)->where('estate_type_id', $estate_type_id)
                ->leftJoin('sp_hinh', 'sp_hinh.id', '=','product.thumbnail_id')
                ->select('sp_hinh.image_url', 'product.*')
                //->where('sp_hinh.image_url', '<>', '')
                ->orderBy('product.id', 'desc')
                ->paginate(24);

        return view('frontend.cate.child', compact('productArr', 'cateArr', 'rs', 'rsCate'));
    }
    public function kygui(Request $request)
    {
        $tagArr = Tag::where('type', 1)->get();
        $directionArr = Direction::all();
        $estate_type_id = $request->estate_type_id ? $request->estate_type_id : null;
        $type = $request->type ? $request->type : 1;    
        
        if( $type ){
            
            $estateTypeArr = EstateType::where('type', $type)->select('id', 'name')->orderBy('display_order', 'desc')->get();            
            
        }       
        $priceUnitList = PriceUnit::all();
        $districtList = District::where('city_id', 1)->get();
       // var_dump($detail->district_id);die;
        $district_id = $request->district_id ? $request->district_id : 2;
        $wardList = Ward::where('district_id', $district_id)->get();
        $streetList = Street::where('district_id', $district_id)->get();
        $projectList = Project::where('district_id', $district_id)->get();

        $tienIchLists = Tag::where(['type' => 3, 'district_id' => $district_id])->get();
        $seo['title'] = $seo['description'] = $seo['keywords'] = "Đăng tin ký gửi";
        return view('frontend.ky-gui.index', compact('estateTypeArr',   'estate_type_id', 'type', 'district_id', 'districtList', 'wardList', 'streetList', 'projectList', 'priceUnitList', 'tagArr', 'tienIchLists', 'directionArr', 'seo'));
    }
    public function postKygui(Request $request){
        $dataArr = $request->all();        
        
        $this->validate($request,[
            'type' => 'required',
            'district_id' => 'required',
            'estate_type_id' => 'required',
            'ward_id' => 'required',
            'street_id' => 'required',
            'price' => 'required',
            'price_unit_id' => 'required',
            'full_address' => 'required',
            'title' => 'required',            
            'contact_name' => 'required',
            'contact_mobile' => 'required'
        ],
        [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'estate_type_id.required' => 'Bạn chưa chọn loại bất động sản',
            'district_id.required' => 'Bạn chưa chọn quận/huyện',
            'ward_id.required' => 'Bạn chưa chọn phường/xã',
            'street_id.required' => 'Bạn chưa chọn đường/phố',
            'price_unit_id.required' => 'Bạn chưa chọn đơn vị',
            'full_address.required' => 'Bạn chưa nhập địa điểm',
            'price.required' => 'Bạn chưa nhập giá',
            'contact_name.required' => 'Bạn chưa nhập họ tên',
            'contact_mobile.required' => 'Bạn chưa nhập di động'            
        ]);
        $dataArr['slug'] = Helper::changeFileName($dataArr['title']); 
        $dataArr['slug'] = str_replace(".", "-", $dataArr['slug']);
        $dataArr['slug'] = str_replace("(", "-", $dataArr['slug']);
        $dataArr['slug'] = str_replace(")", "", $dataArr['slug']);
        $dataArr['alias'] = Helper::stripUnicode($dataArr['title']);

        $dataArr['status'] = 2;          
        $dataArr['city_id'] = 1;      
        
        $rs = Product::create($dataArr);
        $product_id = $rs->id;         
        $this->storeImage( $product_id, $dataArr);       
        
        Session::flash('message', 'Đăng tin ký gửi thành công');

        return redirect()->route('ky-gui-thanh-cong');
    }
    public function kyguiSuccess(){
        $seo['title'] = $seo['description'] = $seo['keywords'] = 'Đăng tin ký gửi thành công';
        return view('frontend.ky-gui.success', compact('seo'));
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
                        if(!is_dir('uploads/thumbs/'.date('Y/m/d'))){
                            mkdir('uploads/thumbs/'.date('Y/m/d'), 0777, true);
                        }
                        $destionation = date('Y/m/d'). '/'. end($tmp);
                        
                        File::move(config('icho.upload_path').$image_url, config('icho.upload_path').$destionation);

                        Image::make(config('icho.upload_path').$destionation)->resize(170, null, function ($constraint) {
                                $constraint->aspectRatio();
                        })->crop(170, 128)->save(config('icho.upload_thumbs_path').$destionation);
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
    public function tags(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');

        $layout_name = "main-category";
        
        $page_name = "page-category";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $is_search = 0;
        $tagName = $request->tagName;

        $title = '';
        $cateDetail = (object) [];       
        
        $cateDetail = Tag::where('slug', $tagName)->first();
       
         $moviesArr = Film::where('status', 1)
        ->join('tag_objects', 'id', '=', 'tag_objects.object_id')
        ->where('tag_objects.tag_id', $cateDetail->id)
        ->where('tag_objects.type', 1)
        ->groupBy('object_id')
        ->orderBy('id', 'desc')->paginate(30);        
       
        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;
        $cateDetail->name = "Phim theo tags : ".'"'.$cateDetail->name.'"';
        

        return view('frontend.cate', compact('title', 'settingArr', 'is_search', 'moviesArr', 'cateDetail', 'layout_name', 'page_name', 'cateActiveArr', 'moviesActiveArr'));
    }
    
    public function daoDien(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');

        $layout_name = "main-category";
        
        $page_name = "page-category";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $is_search = 0;
        $name = $request->name;

        $title = '';
        $cateDetail = (object) [];       
        
        $cateDetail = Crew::where('slug', $name)->first();
       
         $moviesArr = Film::where('status', 1)
        ->join('film_crew', 'id', '=', 'film_crew.film_id')
        ->where('film_crew.crew_id', $cateDetail->id)
        ->where('film_crew.type', 2)
        ->groupBy('film_id')
        ->orderBy('id', 'desc')->paginate(30);        
       
        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;
        $cateDetail->name = "Phim của : ".'"'.$cateDetail->name.'"';
        

        return view('frontend.cate', compact('title', 'settingArr', 'is_search', 'moviesArr', 'cateDetail', 'layout_name', 'page_name', 'cateActiveArr', 'moviesActiveArr'));
    }

    public function dienVien(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');

        $layout_name = "main-category";
        
        $page_name = "page-category";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $is_search = 0;
        $name = $request->name;

        $title = '';
        $cateDetail = (object) [];       
        
        $cateDetail = Crew::where('slug', $name)->first();
       
         $moviesArr = Film::where('status', 1)
        ->join('film_crew', 'id', '=', 'film_crew.film_id')
        ->where('film_crew.crew_id', $cateDetail->id)
        ->where('film_crew.type', 1)
        ->groupBy('film_id')
        ->orderBy('id', 'desc')->paginate(30);         
       
        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;
        $cateDetail->name = "Phim của : ".'"'.$cateDetail->name.'"';
        

        return view('frontend.cate', compact('title', 'settingArr', 'is_search', 'moviesArr', 'cateDetail', 'layout_name', 'page_name', 'cateActiveArr', 'moviesActiveArr'));
    }

    public function newsList(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $layout_name = "main-news";
        
        $page_name = "page-news";

        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $cateDetail = ArticlesCate::where('slug' , 'tin-tuc')->first();
        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;

        $articlesArr = Articles::where('cate_id', 1)->orderBy('id', 'desc')->paginate(10);
        $hotArr = Articles::where( ['cate_id' => 1, 'is_hot' => 1] )->orderBy('id', 'desc')->limit(5)->get();
        return view('frontend.news-list', compact('title','settingArr', 'hotArr', 'layout_name', 'page_name', 'articlesArr'));
    }

    public function newsDetail(Request $request)
    {
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $layout_name = "main-news";
        
        $page_name = "page-news";

        $id = $request->id;

        $detail = Articles::where( 'id', $id )
                ->select('id', 'title', 'slug', 'description', 'image_url', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'custom_text')
                ->first();

        if( $detail ){
            $cateArr = $cateActiveArr = $moviesActiveArr = [];
        
            
            $title = trim($detail->meta_title) ? $detail->meta_title : $detail->title;

            $hotArr = Articles::where( ['cate_id' => 1, 'is_hot' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();

            return view('frontend.news-detail', compact('title', 'settingArr', 'hotArr', 'layout_name', 'page_name', 'detail'));
        }else{
            return view('erros.404');
        }     

        
    }

}
