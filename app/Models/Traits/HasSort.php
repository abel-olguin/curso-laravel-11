<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSort
{
    public function sortFields()
    {
        return ['created_at', 'id'];
    }

    public function scopeWithSort(Builder $builder, $sortBy = null, $direction = null)
    {
        $sortBy = $sortBy ?: request()->get('sortby', 'created_at');

        if (!method_exists($this, 'sortFields')) {
            abort(500, 'Sortable fields are not defined');
        }

        if (!in_array($sortBy, $this->sortFields())) {
            abort(400, 'Invalid sortby');
        }

        $direction = $direction ?: (request()->get('sortDirection') === 'desc' ? 'desc' : 'asc');

        $builder->orderBy($sortBy, $direction);
    }
}
