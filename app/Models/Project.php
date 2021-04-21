<?php


namespace App\Models;

use Eloquent as Model;

class Project extends Model
{    
    public $table = 'projects';
    
    public $fillable = [
        'token',
        'title',
        'description',
        'user_id',
        'status',
    ];

    protected $casts = [
        'token' => 'string',
        'title' => 'string',
        'description' => 'string',
        'user_id' => 'string',
        'status'=>'boolean',
    ];

    public static $adminRules = [
        'token' => 'required',
        'title' => 'required',
        'description' => 'nullable',
        'user_id' => 'required'
    ];

    public static $managerRules = [
        'token' => 'required',
        'title' => 'required',
        'description' => 'nullable',
    ];

    protected $appends = [
        'custom_fields'
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

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_projects', 'project_id');
    }

    
    public static function findPrivilege($user , $project){
        return UserProject::where("user_id", '=', $user)->where("project_id", '=', $project)->first();
    }


    public static function findUsers($token){
        return UserProject::where("project_id", '=', $token)->get();
    }


    public static function find($token){
        return Project::where("token", '=', $token)->first();
    }

    public static function existence($token){

        return Project::where("token", '=', $token)->first();
    }

    public static function generate(){

        $token = Project::random();
        $existenceToken = Project::existence($token);

        if ($existenceToken!= null) {
            existence();
        }else{
        return $token;
        }
    }

    public static function random(){

            $incluye=true;
            $longitud=10;
            $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

            if($incluye) {
                $arrPassResult="";
                for($i=0;$i<$longitud;$i++){
                    $arrPassResult.=$caracteres[rand(0,strlen($caracteres)-1)];
                }
            }

            return $arrPassResult;
    }

    
    public function privilege()
    {
        return $this->belongsToMany(Privilege::class);
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function uploads()
    {
        return $this->hasMany(\App\Models\Upload::class, 'project_id');
    }


}
