<?php

namespace App\Models;

use Eloquent as Model;

class CustomField extends Model
{
    public $table = 'custom_fields';
    
    public $fillable = [
        'name',
        'type',
        'values',
        'disabled',
        'required',
        'in_table',
        'bootstrap_column',
        'order',
        'custom_field_model'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'type' => 'string',
        'values' => 'array',
        'disabled' => 'boolean',
        'required' => 'boolean',
        'in_table' => 'boolean',
        'custom_field_model' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type' => 'required',
        'bootstrap_column' => 'min:1|max:12',
        'custom_field_model' => 'required'
    ];

    /**
     * New Attributes
     *
     * @var array
     */
    protected $appends = [
        
    ];

    
    
}
