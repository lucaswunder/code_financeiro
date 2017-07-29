<?php

namespace CodeFin\Transformers;

use League\Fractal\TransformerAbstract;
use CodeFin\Models\CategoryRevenue;

/**
 * Class CategoryRevenueTransformer
 * @package namespace CodeFin\Transformers;
 */
class CategoryRevenueTransformer extends TransformerAbstract
{

    /**
     * Transform the \CategoryRevenue entity
     * @param \CategoryRevenue $model
     *
     * @return array
     */
    public function transform(CategoryRevenue $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
