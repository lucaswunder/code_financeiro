<?php

namespace CodeFin\Repositories;

use CodeFin\Presenters\CategoryPresenter;
use CodeFin\Repositories\Traits\CategoryRepositoryTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeFin\Repositories\Interfaces\CategoryExpanseRepository;
use CodeFin\Models\CategoryExpanse;
use CodeFin\Validators\CategoryExpanseValidator;

/**
 * Class CategoryExpanseRepositoryEloquent
 * @package namespace CodeFin\Repositories;
 */
class CategoryExpanseRepositoryEloquent extends BaseRepository implements CategoryExpanseRepository
{
    use CategoryRepositoryTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryExpanse::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return CategoryPresenter::class;
    }
}
