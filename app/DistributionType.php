<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributionType extends Model {
    public function documents() {
        return $this->belongsTo(Document::class);
    }
}
