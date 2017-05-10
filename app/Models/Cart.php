<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cart';	

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
                            'name', 
                            'slug', 
                            'type', 
                            'status'
                        ];

    public function cartProduct(){
        return $this->hasMany('App\Models\CartProduct', 'cart_id');
    }
}
