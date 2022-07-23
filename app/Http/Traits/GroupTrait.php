<?php


namespace App\Http\Traits;

use App\Models\Group;

trait GroupTrait
{
    private function getGroups()
    {
        return Group::get();
    }
}