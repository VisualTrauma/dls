<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller {
    protected $expiring_documents;

    public function __construct() {
        $this->expiring_documents = [];
    }

    public function index() {
        $categories         = Category::paginate(10);
        $expiring_documents = $this->expiring_documents;

        return view('categories.index', compact('expiring_documents', 'categories'));
    }

    public function create() {
        return view('categories.create', ['expiring_documents' => $this->expiring_documents, 'categories' => Category::all()]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'             => 'required',
            'raw_attributes'   => 'required',
            'departments'      => 'required',
            'retention_period' => 'required',
            'parent_id'        => 'required_if:category,subcategory'
        ]);

        $root      = 0;
        $parent_id = NULL;

        if ($request->has('parent_id')) {
            $parent_category         = Category::find($request->parent_id);
            $parent_category->parent = 1; //make this category as parent (other categories are under it)
            if ($parent_category->parent_id != NULL) {
                $parent_category->root = 0;
            }
            $parent_category->save();

            $parent_id = $parent_category->id; //save for later use
        }
        else {
            $root = 1;
        }

        $departments = toCommaSeparatedString($request->departments);

        $category                   = new Category();
        $category->name             = strtoupper($request->name);
        $category->created_by       = 1;
        $category->departments      = $departments;
        $category->root             = $root;
        $category->parent_id        = $parent_id;
        $category->retention_period = $request->retention_period;
        $category->save();

        (new AttributesController)->create($request->raw_attributes, $category->id);

        return Category::with('attributes')->get();

        return redirect('categories');
    }
}
