<?php

namespace App\Http\Controllers\Admin;                       // controller namespace - keeps admin controllers organized

use App\Http\Controllers\Controller;                      // base controller to extend
use Illuminate\Http\Request;                              // Request object to access request data
use App\Models\Category;                                  // Category model (assumes you have this model)
use Illuminate\Validation\Rule;                           // Rule helper for validations
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * List categories
     */
    public function index()
    {
        // fetch all categories ordered by newest first
        $categories = Category::orderBy('id', 'desc')->get();

        // return JSON response with 200 status and categories data
        return response()->json($categories, 200);
    }

    /**
     * Create a new category
     */
    public function store(Request $request){
        // validate request input - name is required and must be unique in categories table
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('categories', 'name')],
        ]);

        // create category using validated data
        $category = Category::create([
            'name' => $validated['name'],
            'slug' => \Str::slug($validated['name']), // generate url-friendly slug
        ]);

        // return created resource with 201 status code
        return response()->json($category, 201);
    }

    /**
     * Show a single category
     */
    public function show($id){
        // find category by id or fail (throws 404)
        $category = Category::findOrFail($id);

        // return it as JSON
        return response()->json($category, 200);
    }

    /**
     * Update an existing category
     */
    public function update(Request $request, $id){
        // find category or fail
        $category = Category::findOrFail($id);

        // validate input: name required and unique except current record
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($category->id),
            ],
        ]);

        // update attributes
        $category->name = $validated['name'];
        $category->slug = \Str::slug($validated['name']);
        $category->save(); // persist changes

        // return updated category
        return response()->json($category, 200);
    }

    /**
     * Delete a category
     */
    public function destroy($id){
        // find and delete or 404
        $category = Category::findOrFail($id);
        $category->delete();

        // return no content (successful deletion)
        return response()->json(null, 204);
    }
}
