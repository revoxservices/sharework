<?php

namespace App\Models;

use Eloquent as Model;

class Privilege extends Model
{
    public $table = 'privileges';
    

    public $fillable = [
        'name',
        'description'
    ];

   
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'image' => 'string'
    ];

   
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    
    protected $appends = [
        'custom_fields',
        'has_media'
        
    ];

   
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->sharpen(10);

        $this->addMediaConversion('icon')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->sharpen(10);
    }

    public function customFieldsValues()
    {
        return $this->morphMany('App\Models\CustomFieldValue', 'customizable');
    }

    
    public function getFirstMediaUrl($collectionName = 'default',$conversion = '')
    {
        $url = $this->getFirstMediaUrlTrait($collectionName);
        $array = explode('.', $url);
        $extension = strtolower(end($array));
        if (in_array($extension,config('medialibrary.extensions_has_thumb'))) {
            return asset($this->getFirstMediaUrlTrait($collectionName,$conversion));
        }else{
            return asset(config('medialibrary.icons_folder').'/'.$extension.'.png');
        }
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

    
    public function getHasMediaAttribute()
    {
        return $this->hasMedia('image') ? true : false;
    }

    
    public function foods()
    {
        return $this->hasMany(\App\Models\Food::class, 'category_id');
    }

   
    public function restaurants()
    {
        return $this->belongsToMany(\App\Models\Restaurant::class, 'foods');
    }

    public function discountables()
    {
        return $this->morphMany('App\Models\Discountable', 'discountable');
    }


}
