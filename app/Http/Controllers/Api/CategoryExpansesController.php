<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use CodeFin\Criteria\WithDepthCategoriesCriteria;
use CodeFin\Repositories\Interfaces\CategoryExpanseRepository;


class CategoryExpansesController extends Controller
{

    use CategoriesControllerTrait;
    /**
     * @var CategoryExpanseRepository
     */
    protected $repository;

    public function __construct(CategoryExpanseRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->pushCriteria(new WithDepthCategoriesCriteria());
    }

}
