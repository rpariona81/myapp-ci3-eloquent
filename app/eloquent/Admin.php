<?php
 
namespace Db;
 
use Db\BaseModel;
 
class Admin extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_admin';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','paternal_surname','maternal_surname','mobile',
        'username','email','password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [

    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthdate' => 'datetime:Y-m-d',
        'status' => 'boolean'
    ];

    public static function getAdminBy($column, $value)
    {
        return Admin::where($column, '=',$value)->first();
    }

    
}