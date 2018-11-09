<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteThemeRequest;
use App\Http\Requests\StoreThemeRequest;
use App\Http\Requests\ThemeRequest;
use App\Http\Requests\UpdateThemeRequest;
use App\Services\BlogThemeServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ThemesManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = BlogThemeServices::getAllThemes();
        $currentTheme = BlogThemeServices::getBlogTheme();

        $data = [
            'themes'        => $themes,
            'currentTheme'  => $currentTheme,
        ];

        return View('admin.themesmanagement.index', $data);
    }

    /**
     * Create theme view.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.themesmanagement.create-theme');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = BlogThemeServices::getTheme($id);

        $data = [
            'theme' => $theme,
        ];

        return view('admin.themesmanagement.show-theme')->with($data);
    }

    /**
     * Edit theme view.
     *
     * @param int $id Theme Id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = BlogThemeServices::getTheme($id);

        $data = [
            'theme' => $theme,
        ];

        return view('admin.themesmanagement.edit-theme')->with($data);
    }

    /**
     * Update a theme resource.
     *
     * @param \App\Http\Requests\UpdateThemeRequest $request
     * @param int                                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThemeRequest $request, $id)
    {
        $theme = BlogThemeServices::getTheme($id);
        $theme->fill($request->validated())->save();

        return redirect()
                ->back()
                ->with('success', trans('themes.updateSuccess'));
    }

    /**
     * Store a new blog theme request.
     *
     * @param \App\Http\Requests\StoreThemeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThemeRequest $request)
    {
        $theme = BlogThemeServices::storeNewTheme($request->validated());

        return redirect('admin/themes/'.$theme->id)->with('success', trans('themes.createSuccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDefaultThemeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateDefaultTheme(ThemeRequest $request)
    {
        $theme = BlogThemeServices::updateDefaultThemeSetting($request->currentTheme);

        $data = [
            'theme' => $theme,
        ];

        return response()->json([
            'code'      => 202,
            'message'   => trans('themes.theme_updated'),
            'data'      => $data,
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\UpdateDefaultThemeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteThemeRequest $request, $id)
    {
        $theme = BlogThemeServices::deleteBlogTheme($id);

        return redirect()
                ->route('themes')
                ->withSuccess(trans('themes.theme_deleted', ['name' => $theme->name]));
    }
}
