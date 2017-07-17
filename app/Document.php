<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model {
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['values', 'expiring_documents'];

    protected $dates = ['deleted_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function usersToNotify() {
        return $this->hasMany(UserToNotify::class);
    }

    public function distributionType() {
        return $this->hasOne(DistributionType::class);
    }

    public function values() {
        return $this->hasManyThrough(Category::class, Value::class);
    }
}
