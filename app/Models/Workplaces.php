<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workplaces extends Model
{
    //
    protected $table = "workplaces";
    protected $guarded = [];

    public function details()
    {
        return $this-> hasOne("App\Models\WorkplacesDetails","workplace_id");
    }
    public function workplaceProperties()
    {
        return $this-> hasMany("App\Models\WorkplacesProperties","workplace_id");
    }
    public function workplaceProducts()
    {
        return $this-> hasMany("App\Models\WorkplacesProducts","workplace_id");
    }
    public function workplaceImages()
    {
        return $this-> hasMany("App\Models\WorkplacesImages","workplace_id");
    }
    public function workplaceImage()
    {
        return $this-> hasOne("App\Models\WorkplacesImages","workplace_id");
    }
    public function workplaceSeller()
    {
        return $this-> belongsTo("App\User","user_id");
    }
    public function workplaceComments()
    {
        return $this-> hasMany("App\Models\WorkplacesComments","workplace_id");
    }
    public function workplaceNews()
    {
        return $this-> hasMany("App\Models\WorkplacesNews","workplace_id");
    }
}
