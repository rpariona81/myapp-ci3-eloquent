<?php
 
namespace Db;
 
use Db\BaseModel;
 
class Test extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_offersjob';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'career_title',
        'career_code',
        'career_alias',
        'career_related',
        'career_notes'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

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
        
    ];
    
}