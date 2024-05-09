<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasQueryParams
{
    use HasSort, HasSearch;

    public function scopeWithQueryParams(Builder $builder, $search, $orderBy, $direction)
    {
        return $builder->withSort($orderBy, $direction)->withSearch($search)->paginate();//->withQueryString()
    }
}
