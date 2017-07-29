<?php

namespace CodeFin\Transformers;

use League\Fractal\TransformerAbstract;
use CodeFin\Models\CategoryExpanse;

/**
 * Class CategoryExpanseTransformer
 * @package namespace CodeFin\Transformers;
 */
class CategoryExpanseTransformer extends TransformerAbstract
{

    /**
     * Transform the \CategoryExpanse entity
     * @param \CategoryExpanse $model
     *
     * @return array
     */
    public function transform(CategoryExpanse $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
