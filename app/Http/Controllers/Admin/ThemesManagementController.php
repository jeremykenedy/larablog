<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeRequest;
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
        $themes         = BlogThemeServices::getAllThemes();
        $currentTheme   = BlogThemeServices::getBlogTheme();

        $data = [
            'themes'        => $themes,
            'currentTheme'  => $currentTheme,
        ];

        return View('admin.themesmanagement.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDefaultThemeRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateDefaultTheme(ThemeRequest $request)
    {
        $theme = BlogThemeServices::updateDefaultThemeSetting($request->currentTheme);

        $data = [
            'theme' => $theme
        ];

        return response()->json([
            'code'      => 202,
            'message'   => trans('themes.theme_updated'),
            'data'      => $data
        ], Response::HTTP_ACCEPTED);
    }
}
