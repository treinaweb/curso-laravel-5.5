<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'cost', 'description'];
    
    /**
     * método da relação
     *
     * @return void
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
