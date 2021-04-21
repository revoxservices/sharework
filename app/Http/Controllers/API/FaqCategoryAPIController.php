<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\FaqCategoryRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

class FaqCategoryAPIController extends Controller
{
    /** @var  FaqCategoryRepository */
    private $faqCategoryRepository;

    public function __construct(FaqCategoryRepository $faqCategoryRepo)
    {
        $this->faqCategoryRepository = $faqCategoryRepo;
    }

    public function index(Request $request)
    {
        try{
            $this->faqCategoryRepository->pushCriteria(new RequestCriteria($request));
            $this->faqCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $faqCategories = $this->faqCategoryRepository->all();

        return $this->sendResponse($faqCategories->toArray(), 'Faq Categories retrieved successfully');
    }

  
    public function show($id)
    {
        /** @var FaqCategory $faqCategory */
        if (!empty($this->faqCategoryRepository)) {
            $faqCategory = $this->faqCategoryRepository->findWithoutFail($id);
        }

        if (empty($faqCategory)) {
            return $this->sendError('Faq Category not found');
        }

        return $this->sendResponse($faqCategory->toArray(), 'Faq Category retrieved successfully');
    }
}
