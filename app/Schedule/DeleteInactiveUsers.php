<?php

namespace App\Schedule;

class DeleteInactiveUsers
{
    private function delete()
    {
        \App\Models\User::inactive()->delete();

    }

    public function __invoke()
    {
        $this->delete();
    }
}
