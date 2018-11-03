<?php

namespace App\Services;

use App\Models\Theme;
use App\Models\BlogSetting;

class BlogThemeServices
{
    /**
     * Return the blog theme.
     *
     * @param string $text
     *
     * @return string
     */
    public static function getBlogTheme()
    {
        $self = new BlogThemeServices;

        return Theme::find($self->getBlogThemeId());
    }

    /**
     * Returns the blog theme identifier.
     *
     * @return string
     */
    public function getBlogThemeId()
    {
        return BlogSetting::themeId()->pluck('value')->first();
    }

    /**
     * Gets all themes.
     *
     * @return collection
     */
    public static function getAllThemes()
    {
        return Theme::orderBy('name', 'asc')->get();
    }

    /**
     * Update the default theme in the settings
     *
     * @param int $themeId  The theme identifier
     *
     * @return collection
     */
    public static function updateDefaultThemeSetting($themeId)
    {
        $blogTheme = BlogSetting::where('key','=','blog_theme_id')->first();
        $blogTheme->value = $themeId;
        $blogTheme->save();

        return $blogTheme;
    }
}
