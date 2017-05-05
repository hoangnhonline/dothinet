<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Hash;
use App\Models\Settings;
use App\Models\EstateType;

//use App\Models\Entity\SuperStar\Account\Traits\Behavior\SS_Shortcut_Icon;

/**
 * This is provider for using view share
 * @author AnPCD
 */
class ViewComposerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//Call function composerSidebar
		$this->composerMenu();	
		
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Composer the sidebar
	 */
	private function composerMenu()
	{
		
		view()->composer( '*' , function( $view ){		
			$banList = $thueList = [];	
			$tmp = EstateType::where('status', 1)->get();
			foreach($tmp as $est){
				if($est->type == 1){
					$banList[] = $est;
				}else{
					$thueList[] = $est;
				}
			}
	        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
	       // var_dump("<pre>", $menuDoc);die;   
	        //var_dump("<pre>", $loaiSpKey);die;
			$view->with( ['loaiSpKey' => [], 'menuNgang' => [], 'menuDoc' => [], 'loaiSpHot' => [], 'settingArr' => $settingArr, 
			'banList' => $banList, 'thueList' => $thueList] );
			
		});
	}
	
}
