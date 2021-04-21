<?php


namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;

    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }
    
    use HasRoles;

    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
    ];

    public $table = 'users';
   
    public $fillable = [
        'name',
        'email',
        'password',
        'api_token',
        'device_token',
    ];
   
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'api_token' => 'string',
        'device_token' => 'string',
        'remember_token' => 'string'
    ];
    
    protected $appends = [
        'custom_fields',
        'has_media'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

   
    public function routeNotificationForFcm($notification)
    {
        return $this->device_token;
    }

  
    public function registerMediaConversions(\Spatie\MediaLibrary\Models\Media $media = null)
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
        if ($url) {
            $array = explode('.', $url);
            $extension = strtolower(end($array));
            if (in_array($extension, config('medialibrary.extensions_has_thumb'))) {
                return asset($this->getFirstMediaUrlTrait($collectionName, $conversion));
            } else {
                return asset(config('medialibrary.icons_folder') . '/' . $extension . '.png');
            }
        }else{
            return asset('images/avatar_default.png');
        }
    }

    public function getCustomFieldsAttribute()
    {
        $hasCustomField = in_array(static::class,setting('custom_field_models',[]));
        if (!$hasCustomField){
            return [];
        }
        $array = $this->customFieldsValues()
            ->join('custom_fields', 'custom_fields.id', '=', 'custom_field_values.custom_field_id')
//            ->where('custom_fields.in_table', '=', true)
                ->select(['value','view','name'])
            ->get()->toArray();

        return convertToAssoc($array, 'name');
    }

    public function customFieldsValues()
    {
        return $this->morphMany('App\Models\CustomFieldValue', 'customizable');
    }

    public function getHasMediaAttribute()
    {
        return $this->hasMedia('avatar') ? true : false;
    }
   
    public function plan()
    {
        return $this->belongsToMany(\App\Models\User::class, 'subscriptions', 'user_id');
    }
    
    public static function auth(){

        return Auth::user();
    }




}
