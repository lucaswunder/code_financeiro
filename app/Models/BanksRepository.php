<?php

namespace CodeFin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BanksRepository extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
