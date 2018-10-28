<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateSitemapRequest;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;

class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.home');
    }

    /**
     * Show the application files manager/uploads dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploads()
    {
        return view('admin.pages.uploads');
    }

    /**
     * Show the application sitemap dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
        $sitemap = base_path('public/sitemap.xml');
        $modified = null;
        $sitemapxml = [];

        if (file_exists($sitemap)) {
            $sitemapxml = simplexml_load_file($sitemap);
            $modified = date('F jS, Y H:i:s', filemtime($sitemap));
        }

        $data = [
            'sitemap'   => $sitemapxml,
            'modified'  => $modified,
        ];

        return view('admin.pages.sitemap', $data);
    }

    /**
     * Generate Sitemap from Artisan Command via Request.
     *
     * @param \App\Http\Requests\GenerateSitemapRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function generateSitemap(GenerateSitemapRequest $request)
    {
        Artisan::call('sitemap:generate', ['limit' => $request->limit]);

        return redirect()->back()->withSuccess(trans('forms.sitemap.messages.success'));
    }
}
