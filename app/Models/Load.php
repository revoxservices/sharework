<?php
/**
 * File name: Food.php
 * Last modified: 2020.06.11 at 16:10:52
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 */

namespace App\Models;

use Eloquent as Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Load extends Model implements HasMedia
{
    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }

    public $table = 'uploads';

    public static $rules = [
        'name' => 'required',
        'file_name' => 'required',
        'size' => 'required',
        'mime_type' => 'required',
        'user_id' => 'required|exists:users,id',
        'project_id' => 'required|exists:projects,id'
    ];
    
    public $fillable = [
        'name',
        'file_name',
        'size',
        'mime_type',
        'user_id',
        'project_id',
    ];

    protected $casts = [
        'name' => 'string',
        'file_name' => 'string',
        'size' => 'integer',
        'mime_type' => 'string',
        'user_id' => 'integer',
        'projet_id' => 'integer',
        'image' => 'string'
    ];

    protected $appends = [
        'custom_fields',
        'has_media',
        'project'
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

    public function getFirstMediaUrl($collectionName = 'default', $conversion = '')
    {
        $url = $this->getFirstMediaUrlTrait($collectionName);
        $array = explode('.', $url);
        $extension = strtolower(end($array));
        if (in_array($extension, config('medialibrary.extensions_has_thumb'))) {
            return asset($this->getFirstMediaUrlTrait($collectionName, $conversion));
        } else {
            return asset(config('medialibrary.icons_folder') . '/' . $extension . '.png');
        }
    }

    public function getCustomFieldsAttribute()
    {
        $hasCustomField = in_array(static::class, setting('custom_field_models', []));
        if (!$hasCustomField) {
            return [];
        }
        $array = $this->customFieldsValues()
            ->join('custom_fields', 'custom_fields.id', '=', 'custom_field_values.custom_field_id')
            ->where('custom_fields.in_table', '=', true)
            ->get()->toArray();

        return convertToAssoc($array, 'name');
    }

    public function customFieldsValues()
    {
        return $this->morphMany('App\Models\CustomFieldValue', 'customizable');
    }

    public function getHasMediaAttribute()
    {
        return $this->hasMedia('image') ? true : false;
    }

}
