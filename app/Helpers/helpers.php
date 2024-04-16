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
