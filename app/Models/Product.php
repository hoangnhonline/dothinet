<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product';	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'title', 
                            'slug', 
                            'description', 
                            'type', 
                            'estate_type_id', 
                            'city_id', 
                            'district_id', 
                            'ward_id', 
                            'street_id', 
                            'project_id', 
                            'price',
                            'price_unit_id', 
                            'area', 
                            'full_address', 
                            'front_face', 
                            'street_wide',
                            'no_floor', 
                            'no_room', 
                            'direction_id',      
                            'no_wc',
                            'image_url', 
                            'video_url', 
                            'contact_name', 
                            'contact_address', 
                            'contact_phone',
                            'contact_mobile', 
                            'contact_email', 
                            'url_dothi', 
                            'status', 
                            'meta_id',
                            'customer_id',
                            'thumbnail_id',
                            'cart_status'
                        ];

    public static function productTag( $id )
    {
        $arr = [];
        $rs = TagObjects::where( ['type' => 1, 'object_id' => $id] )->lists('tag_id');
        if( $rs ){
            $arr = $rs->toArray();
        }
        return $arr;
    }
    public static function productTienIch( $id )
    {
        $arr = [];
        $rs = TagObjects::where( ['type' => 3, 'object_id' => $id] )->lists('tag_id');
        if( $rs ){
            $arr = $rs->toArray();
        }
        return $arr;
    }
    
}
