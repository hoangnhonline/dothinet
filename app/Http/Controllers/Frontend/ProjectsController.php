<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LandingProjects;
use App\Models\ProContent;
use App\Models\MetaData;
use App\Models\Articles;


use Helper, File, Session, Auth;
use Mail;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {   
        $dt = Carbon::now()->format('Y-m-d H:i:s');

        $dataList = LandingProjects::where('from_date', '<=', $dt)->where('to_date', '>=', $dt)->where('status', 1)->get();
        $seo['title'] = $seo['description'] = $seo['keywords'] = "Chương trình khuyến mãi - NhaDat";                
        
        $socialImage = "";
        return view('frontend.event.index', compact('seo', 'socialImage', 'dataList'));
    }

    public function detail(Request $request){

        $project_id = $request->id;        
        $detail = LandingProjects::find($project_id);
        $tabList = LandingProjects::getListTabProject($project_id); 
        $tabArr = [];
        foreach($tabList as $tmp) {
            $tabArr[] = $tmp->id;
        }
        $contentList = Articles::where('project_id', $project_id)->get();
        $contentArr = [];
        foreach($contentList as $content){           
            $contentArr[$content->tab_id] = $content;
            
        }        
        $socialImage = $detail->image_url;
        if( $detail->meta_id > 0){
           $seo = MetaData::find( $detail->meta_id )->toArray();
           $seo['title'] = $seo['title'] != '' ? $seo['title'] : $detail->name;
           $seo['description'] = $seo['description'] != '' ? $seo['description'] : $detail->name;
           $seo['keywords'] = $seo['keywords'] != '' ? $seo['keywords'] : $detail->name;
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->name;
        }  
        
        return view('frontend.projects.detail', compact('seo', 'socialImage', 'detail', 'tabList', 'tabArr', 'contentArr'));
    }

}

