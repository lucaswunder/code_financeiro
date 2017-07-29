<?php

namespace CodeFin\Presenters;

use CodeFin\Transformers\CategoryRevenueTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryRevenuePresenter
 *
 * @package namespace CodeFin\Presenters;
 */
class CategoryRevenuePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryRevenueTransformer();
    }
}
