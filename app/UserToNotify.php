<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToNotify extends Model {
    public function document() {
        return $this->belongsTo(Document::class);
    }
}
