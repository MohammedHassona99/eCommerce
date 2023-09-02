<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;


class MainCategoriesController extends Controller
{
    public function index()
    {
        $default_lang = get_default_lang();
        $categories = MainCategory::where('translation_lang', $default_lang)->selection()->get();
        return view('admin.mainCategories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.mainCategories.create');
    }
    // public function store()
    // {
    //     return view('admin.main_categories.index');
    // }
    // public function edit()
    // {
    //     return view('admin.main_categories.index');
    // }
    // public function update()
    // {
    //     return view('admin.main_categories.index');
    // }
    // public function delete()
    // {
    //     return view('admin.main_categories.index');
    // }
}
