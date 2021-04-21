<?php

namespace App\Repositories;

use App\Models\Media;
use App\Models\User;
use App\Models\UserUpload;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use InfyOm\Generator\Common\BaseRepository;


class UploadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Upload::class;
    }

    public function getByUuid($uuid = '')
    {
        $uploadModel = Upload::query()->where('uuid', $uuid)->first();
        return $uploadModel;
    }

    /**
     * @param $uuid
     */
    public function clearUpload($token)
    {
        $upload = Upload::query()->where('id', $token)->first();
        $shares = UserUpload::query()->where('upload_id', $upload->id)->get();
        $media = Media::query()->where('model_id', $upload->id)->first();


        if(count($shares)>=1){
                foreach($shares as $load){
                    $load->delete();
                }
        }

        if($media!=null){
                $string = $media->id;
                $elemnt = Storage::disk('public')->delete($string);
                $media->delete();
        }

        $upload->delete();

        return 'true';
    }

    /**
     * clear all uploaded cache
     */
    public function clearAll()
    {
        Upload::query()->where('id', '>', 0)->delete();
        Media::query()->where('model_type', '=', 'App\Models\Upload')->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function allMedia($collection = null)
    {
        $medias = Media::where('model_type', '=', 'App\Models\Upload');
        if ($collection) {
            $medias = $medias->where('collection_name', $collection);
        }
        $medias = $medias->orderBy('id','desc')->get();
        return $medias;
    }


    public function created($input, $project, $user)
    {
        $thumbnail = $input['file'];
        $thumbnail_file = $thumbnail->getClientOriginalName();
        $thumbnail_size = $thumbnail->getClientSize();
        $thumbnail_mime = $thumbnail->getClientOriginalExtension();
        $explode = explode(".", $thumbnail_file);
        $thumbnail_name = $explode[0];

        $upload = new Upload;
        $upload->name = $thumbnail_name;
        $upload->file_name = $thumbnail_file;
        $upload->size = $thumbnail_size;
        $upload->mime_type = $thumbnail_mime;
        $upload->user_id = $user;
        $upload->project_id = $project;
        $upload->save();

        $share = new UserUpload;
        $share->user_id = $user;
        $share->project_id = $project;
        $share->upload_id = $upload->id;
        $share->privilege_id = 1;
        $share->save();

        return $upload;
    }


    public function collectionsNames(){

        $medias = Media::all('collection_name')->pluck('collection_name','collection_name')->map(function ($c) {
                return ['value' => $c,
                    'title' => title_case(preg_replace('/_/', ' ', $c))
                ];
        })->unique();

        unset($medias['default']);
        $medias->prepend(['value' => 'default', 'title' => 'Default'],'default');
        return $medias;
    }

    public function myUpload($project){
        return Upload::where('id', $project)->first();
    }

    public function findWithoutUploads(){
        return Upload::where('user_id', auth()->id())->get();
    }

    
    public static function findWithoutStorage(){
        return  Upload::where('user_id', auth()->id())->sum('size');
    }
    
    public function outUploads($project){
        return Upload::where('project_id', $project)->get();
    }


    public function myUploads($project , $user){
        return UserUpload::where('project_id', $project)->where('user_id', $user)->where('privilege_id' , 1)->get();
    }

    public function myShares($project , $user){
        return UserUpload::where('project_id', $project)->where('user_id', $user)->where('privilege_id', '<>' , 1)->get();
    }


    public function myTeamsUploads($upload)
    {
        return User::join("user_uploads", "user_uploads.user_id", "=", "users.id")
            ->where('user_uploads.upload_id', $upload)->get();
    }

}
