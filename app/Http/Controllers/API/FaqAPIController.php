<?php

namespace App\Http\Controllers\API;


use App\Models\Faq;
use Illuminate\Http\Request;
use App\Repositories\FaqRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

class FaqAPIController extends Controller
{
    /** @var  FaqRepository */
    private $faqRepository;

    public function __construct(FaqRepository $faqRepo)
    {
        $this->faqRepository = $faqRepo;
    }

   
    public function index(Request $request)
    {
        try{
            $this->faqRepository->pushCriteria(new RequestCriteria($request));
            $this->faqRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $faqs = $this->faqRepository->all();

        return $this->sendResponse($faqs->toArray(), 'Faqs retrieved successfully');
    }

   
    public function show($id)
    {
        /** @var Faq $faq */
        if (!empty($this->faqRepository)) {
            $faq = $this->faqRepository->findWithoutFail($id);
        }

        if (empty($faq)) {
            return $this->sendError('Faq not found');
        }

        return $this->sendResponse($faq->toArray(), 'Faq retrieved successfully');
    }
}
