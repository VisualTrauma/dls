<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model {
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function value() {
        return $this->hasOne(Value::class);
    }
}
