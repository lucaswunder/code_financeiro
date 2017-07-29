<?php

namespace CodeFin\Presenters;

use CodeFin\Transformers\CategoryExpanseTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryExpansePresenter
 *
 * @package namespace CodeFin\Presenters;
 */
class CategoryExpansePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryExpanseTransformer();
    }
}
