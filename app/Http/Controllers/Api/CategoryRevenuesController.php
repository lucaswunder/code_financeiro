<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use CodeFin\Criteria\WithDepthCategoriesCriteria;
use CodeFin\Repositories\Interfaces\CategoryRevenueRepository;


class CategoryRevenuesController extends Controller
{

    use CategoriesControllerTrait;

    /**
     * @var CategoryRevenueRepository
     */
    protected $repository;

    public function __construct(CategoryRevenueRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->pushCriteria(new WithDepthCategoriesCriteria());
    }
}
