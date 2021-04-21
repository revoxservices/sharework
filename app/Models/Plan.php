<?php

namespace App\Models;

use Eloquent as Model;

class Plan extends Model
{

    public $table = 'plans';
    

    public $fillable = [
        'name',
        'size',
        'description',
    ];

    protected $casts = [
        'name' => 'string',
        'size' => 'string',
        'code' => 'string'
    ];

    public static $rules = [
        'name' => 'required',
        'symbol' => 'required',
        'code' => 'required',
    ];

    protected $appends = [
        'custom_fields',
        'name_symbol',

    ];

    public function customFieldsValues()
    {
        return $this->morphMany('App\Models\CustomFieldValue', 'customizable');
    }

    public function getCustomFieldsAttribute()
    {
        $hasCustomField = in_array(static::class,setting('custom_field_models',[]));
        if (!$hasCustomField){
            return [];
        }
        $array = $this->customFieldsValues()
            ->join('custom_fields','custom_fields.id','=','custom_field_values.custom_field_id')
            ->where('custom_fields.in_table','=',true)
            ->get()->toArray();

        return convertToAssoc($array,'name');
    }

    public function getNameSymbolAttribute() {
        return $this->name . ' - ' . $this->symbol;
    }

    
    
}
