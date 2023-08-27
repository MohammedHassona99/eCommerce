<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;

class languageController extends Controller
{
    public function all()
    {
        $languages = Language::select()->paginate(PAGINATION);
        return view('admin.languages.index', compact('languages'));
    }
    public function create()
    {
        return view('admin.languages.create');
    }
    public function store(LanguageRequest $request)
    {
        // return $request->all();
        try {
            Language::create($request->except(['_token']));
            return redirect()->route('admin.langs')->with(['success' => 'adding is true']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.langs')->with(['error' => 'error for adding lang please try again']);
        }
    }
}
