<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model {
    public function expiringDocument() {
        return $this->belongsTo(ExpiringDocument::class);
    }
}
