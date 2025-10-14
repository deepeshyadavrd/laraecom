<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id' => 1, 'name' => 'Chair', 'price' => 1500],
            ['id' => 2, 'name' => 'Table', 'price' => 3000],
        ]);
    }
}
