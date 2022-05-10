<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkplacesProducts extends Model
{
    //
    protected $table = "workplaces_products";
    protected $guarded = [];

    public function product()
    {
        return $this-> belongsTo("App\Models\Products","product_id");
    }
}
