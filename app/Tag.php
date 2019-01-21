<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function aprend()
    {
        return $this->morphedByMany('App\aprendizaje', 'taggable');
    }

    public function conv()
    {
        return $this->morphedByMany('App\Convenio', 'taggable');
    }

    public function exten()
    {
        return $this->morphedByMany('App\extension', 'taggable');
    }
}
