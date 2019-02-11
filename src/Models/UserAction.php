<?php

namespace Djavue\Auth\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAction
 *
 * @package Auth
 * @property string $user
 * @property string $action
 * @property string $action_model
 * @property integer $action_id
*/
class UserAction extends Model
{
    use SoftDeletes;
	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auth_user_actions';
	
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
		'action', 'action_model', 'action_id', 'user_id'
	];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
