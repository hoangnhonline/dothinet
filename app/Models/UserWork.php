<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserWork extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_work';	

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
    protected $fillable = [ 'user_id', 'work_content', 'work_date', 'leader_comment', 'status'];
        
}