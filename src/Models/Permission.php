<?php

namespace Djavue\Auth\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 *
 * @package Auth
 * @property string $title
*/
class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auth_permissions';
	
    protected $fillable = ['title'];
    

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required'
        ];
    }

    

    
    
    
}
