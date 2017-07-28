<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    public function documents() {
        return $this->hasMany(Document::class);
    }

    public function attributes() {
        return $this->hasMany(Attribute::class);
    }

    public function getRetentionPeriodAttribute($value) {
   		switch ($value) {
   		 	case 0: return '<span class="uk-badge uk-badge-success uk-text-bold">INDEFINITE</span>'; break;
   		 	case 3: return '<span class="uk-badge uk-badge-danger uk-text-bold">3 years</span>'; break;
   		 	case 5: return '<span class="uk-badge uk-badge-warning uk-text-bold">5 years</span>'; break;
            default: return 'Error'; break;
   		 }
    }

    public function getRootAttribute($value) {
        switch($value) {
            case 1: return '<span class="uk-text-bold uk-text-capitalize">YES</span>'; break;
            case 0: return '<span class="uk-text-bold uk-text-capitalize">NO</span>'; break;
            default: return 'Error'; break;
        }
    }
}
