<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller {
    public function create($attributes, $category_id) {
        $attributes = stringToArray($attributes);

        foreach($attributes as $attribute) {
            $newAttribute = new Attribute();
            $newAttribute->category_id = $category_id;
            $newAttribute->raw_name = $attribute;
            $newAttribute->modified_name = snake_case(camel_case($attribute));
            $newAttribute->save();
        }
    }
}
