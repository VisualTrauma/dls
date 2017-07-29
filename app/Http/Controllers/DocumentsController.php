<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Category;

class DocumentsController extends Controller
{
    public function index() {
    	$expiring_documents = [];
		$documents = Document::paginate(1);

    	return view('documents.index', compact('expiring_documents', 'documents'));
    }

    public function create() {
        $categories = Category::with('attributes')->select('id', 'name')->get();
    	$attributes = collect();
    	foreach($categories as $category) {
            if($category->attributes->isNotEmpty()) {
                $attributes->push($category->attributes);
            }
        }
        $attributes = $attributes;
    	$categories = $categories;
    	$expiring_documents = [];

    	return view('documents.create', compact('expiring_documents', 'categories', 'attributes'));
    }
}
