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

    /**
     * método da relação N para N
     *
     * @return void
     */
    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }
}
