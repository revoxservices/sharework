<?php

namespace App\Criteria\Projects;


use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ProjectsOfUploadsCriteria.
 *
 * @package namespace App\Criteria\Restaurants;
 */
class ProjectsOfUploadsCriteria implements CriteriaInterface
{
    /**
     * @var array
     */
    private $request;

    /**
     * ProjectsOfUploadsCriteria constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if(!$this->request->has('uploads')) {
            return $model;
        } else {
            $uploads = $this->request->get('uploads');

            if (in_array('0',$uploads)) {
                return $model;
            }
            
            return $model->join('user_uploads', 'user_uploads.project_id', '=', 'projects.id')
                ->whereIn('user_uploads.project_id', $this->request->get('cuisines'))->groupBy('projects.id');
        }
    }
}
