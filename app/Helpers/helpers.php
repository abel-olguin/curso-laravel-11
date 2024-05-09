<?php

use Illuminate\Support\Facades\DB;

function transactional(Closure $callback)
{
    DB::beginTransaction();
    try {
        $result = $callback();
        DB::commit();
        return $result;
    } catch (\Exception $e) {
        DB::rollBack();
        dd($e);
    }
}

function sortLink($field)
{
    return route('dashboard.posts.index', [
        'orderby'       => $field,
        'sortDirection' => request()->get('orderby') === $field && request()->get('sortDirection') === 'asc' ? 'desc' :
            'asc'
    ]);
}
