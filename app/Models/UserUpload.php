<?php

namespace App\Models;

use Eloquent as Model;

use App\Models\User;
use App\Models\Project;
use App\Models\Privilege;
use App\Models\Upload;

class UserUpload extends Model
{    
        public $table = 'user_uploads';
        
        public $fillable = [
            'user_id',
            'upload_id',
            'privilege_id',
            'creator',
        ];

        protected $appends = [
            'custom_fields',
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

        
        public static function find($id){

            return UserProject::where("id", '=', $id)->first();
        }


        public static function existence($token){

            return UserProject::where("token", '=', $token)->first();
        }


        public static function generate(){

            $token = UserProject::random();
            $existenceToken = UserProject::existence($token);

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


        public function project()
        {
            return $this->belongsTo(Project::class, 'project_id', 'id');
        }

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }

        public function upload()
        {
            return $this->belongsTo(Upload::class, 'upload_id', 'id');
        }


        public function privilege()
        {
            return $this->belongsTo(Privilege::class, 'privilege_id', 'id');
        }

        
}
