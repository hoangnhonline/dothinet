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
use App\Models\Direction;
use App\Models\PriceUnit;

use Helper, File, Session, Auth;

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

        if( $detail->meta_id > 0){
           $meta = MetaData::find( $detail->meta_id )->toArray();
           $seo['title'] = $meta['title'] != '' ? $meta['title'] : $detail->name;
           $seo['description'] = $meta['description'] != '' ? $meta['description'] : $detail->name;
           $seo['keywords'] = $meta['keywords'] != '' ? $meta['keywords'] : $detail->name;
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->name;
        }               
        
        if($detail->thumbnail_id > 0){
            $socialImage = ProductImg::find($detail->thumbnail_id)->image_url;
        }
        return view('frontend.detail.index', compact('detail', 'rsLoai', 'hinhArr', 'productArr', 'seo', 'socialImage'));
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
        return view('frontend.ky-gui.index', compact('estateTypeArr',   'estate_type_id', 'type', 'district_id', 'districtList', 'wardList', 'streetList', 'projectList', 'priceUnitList', 'tagArr', 'tienIchLists', 'directionArr'));
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
