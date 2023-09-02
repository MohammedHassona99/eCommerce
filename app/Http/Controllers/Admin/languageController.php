<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Requests\LanguageRequest;

class languageController extends Controller
{
    public function all()
    {
        $languages = Language::selection()->paginate(PAGINATION);
        return view('admin.languages.index', compact('languages'));
    }
    public function create()
    {
        return view('admin.languages.create');
    }
    public function store(LanguageRequest $request)
    {
        try {
            Language::create($request->except(['_token']));
            return redirect()->route('admin.langs')->with(['success' => 'adding is true']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.langs')->with(['error' => 'error for adding lang please try again']);
        }
    }
    public function edit($id)
    {
        $language = Language::select()->find($id);
        if (!$language) {
            return redirect()->route('admin.langs')->with(['error' => 'this language does not existing']);
        }
        return view('admin.languages.edit', compact('language'));
    }
    public function update(LanguageRequest $request, $id)
    {
        try {

            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.edit', $id)->with(['error' => 'this language does not existing']);
            }
            if (!$request->has('active')) {
                $request->request->add(['active' => 0]);
            }
            $language->update($request->except('_token'));
            return redirect()->route('admin.langs')->with(['success' => 'updating is true']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.langs')->with(['error' => 'error for adding lang please try again']);
        }
    }
    public function destroy($id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.langs', $id)->with(['error' => 'this language does not existing']);
            }
            $language->delete();
            return redirect()->route('admin.langs')->with(['success' => 'deleting is true']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.langs')->with(['error' => 'error for adding lang please try again']);
        }
    }
}
