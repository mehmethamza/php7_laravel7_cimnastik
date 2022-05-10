<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkplacesProperties extends Model
{
    //
    protected $table = "workplaces_properties";
    protected $guarded = [];
    public function property()
    {
        return $this-> belongsTo("App\Models\Properties","property_id");
    }
}
