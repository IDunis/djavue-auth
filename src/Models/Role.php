<?php

namespace Djavue\Auth\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package Auth
 * @property string $title
*/
class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auth_roles';
	
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
		'title'
	];

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'permission' => 'array|required',
            'permission.*' => 'integer|exists:permissions,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'permission' => 'array|required',
            'permission.*' => 'integer|exists:permissions,id|max:4294967295|required'
        ];
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'auth_permission_role');
    }
    
    
}
