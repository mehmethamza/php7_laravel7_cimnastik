<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkplacesComments extends Model
{
    protected $guarded = [];
    protected $table = "workplaces_comments";
    public function childComments()
    {
        return $this ->hasMany("App\Models\WorkplacesComments","pid");
    }
}
