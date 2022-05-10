<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkplacesNews extends Model
{
    protected $table="workplaces_news";
    protected $guarded=[];

    public function getWorkplace()
    {
        return $this->belongsTo("App\Models\Workplaces","workplace_id");
    }
}
