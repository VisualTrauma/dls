<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller {
    public function create($attributes, $category_id) {
        $attributes = stringToArray($attributes);

        foreach($attributes as $attribute) {
            $attribute = new Attribute();
            $attribute->category_id = $category_id;
            $attribute->raw_name = $attribute;
            $attribute->modified_name = snake_case(camel_case($attribute));
            $attribute->save();
        }
    }
}
