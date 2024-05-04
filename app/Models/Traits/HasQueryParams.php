<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasQueryParams
{
    use HasSort, HasSearch;

    public function scopeWithQueryParams(Builder $builder, $search)
    {
        return $builder->withSort()->withSearch($search)->paginate()->withQueryString();
    }
}
