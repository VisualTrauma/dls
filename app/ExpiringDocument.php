<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpiringDocument extends Model {
    use SoftDeletes, CascadeSoftDeletes;

    public function document() {
        return $this->belongsTo(Document::class);
    }

    public function views() {
        return $this->hasMany(View::class);
    }
}
