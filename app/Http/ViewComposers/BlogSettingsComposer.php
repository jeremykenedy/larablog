<?php

namespace App\Http\ViewComposers;

use App\Models\Theme;
use App\Models\BlogSetting;
use App\Services\BlogThemeServices;
use Illuminate\View\View;

class BlogSettingsComposer
{
    protected $theme;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->theme = BlogThemeServices::getBlogTheme();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $data = [
            'theme' =>$this->theme,
        ];

        $view->with($data);
    }
}
