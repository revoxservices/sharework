<?php
/**
 * File name: Category.php
 * Last modified: 2020.05.02 at 08:39:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Models;

use Eloquent as Model;

use App\Models\Project;
use App\Models\User;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


use App\Models\UserUpload;

class Upload extends Model implements HasMedia
{
    use HasMediaTrait {
        getFirstMediaUrl as getFirstMediaUrlTrait;
    }

    public $table = 'uploads';

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

    public function getUrl($collectionName = 'default',$conversion = '')
    {
        $url = $this->getFirstMediaUrlTrait($collectionName);
        
        return $url;
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

    /**
     * Add Media to api results
     * @return bool
     */
    public function getHasMediaAttribute()
    {
        return $this->hasMedia('image') ? true : false;
    }
    

    /**
    * Return the post's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    /**
    * Return the post's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function share()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_uploads', 'upload_id');
    }



}
