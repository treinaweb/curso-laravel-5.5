<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'age', 'photo', 'user_id'];

    //protected $guarded = ['_token'];

    /**
     * método da relação
     *
     * @return void
     */
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
