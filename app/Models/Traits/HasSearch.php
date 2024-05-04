<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function searchFields()
    {
        return [];
    }

    public function scopeWithSearch(Builder $builder, $search = null)
    {
        $search = $search ?: request()->get('search');

        if (!$search) {
            return;
        }

        if (!method_exists($this, 'searchFields')) {
            abort(500, 'Search fields are not defined');
        }

        $builder->where(function ($query) use ($search) {
            foreach (explode(' ', $search) as $word) {// separamos todas las palabras
                foreach ($this->searchFields() as $field) {
                    $query->OrWhere($field, 'like', "%{$word}%"); // buscamos por cada palabra
                    //  (tile like '%fsdf%' or description like '%fsdf%')
                }
            }

        });

    }
}
