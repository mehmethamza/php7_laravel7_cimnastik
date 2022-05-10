<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WorkplacesMessages extends Model
{
    protected $table = "workplaces_messages";
    protected $guarded = [];

    public function getWorkplace()
    {
        return $this->belongsTo("App\Models\Workplaces","workplace_id");
    }
}
