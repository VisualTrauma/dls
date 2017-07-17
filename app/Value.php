<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model {
    public function document() {
        return $this->belongsTo(Document::class);
    }

    public function attribute() {
        return $this->belongsTo(Attribute::class);
    }
}
