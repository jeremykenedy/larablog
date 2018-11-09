<?php

namespace App\Services;

use App\Models\BlogSetting;
use App\Models\Theme;

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
        $self = new self();

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
     * Gets a theme.
     *
     * @param int$id
     *
     * @return colletion.
     */
    public static function getTheme($id)
    {
        return Theme::findOrFail($id);
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
     * Stores a new theme.
     *
     * @param $validatedRequest  The validated request
     *
     * @return collection
     */
    public static function storeNewTheme($validatedRequest)
    {
        $taggableBase = [
            'taggable_id'     => 0,
            'taggable_type'   => 'theme',
        ];

        $theme = Theme::create(array_merge($validatedRequest, $taggableBase));
        $theme->taggable_id = $theme->id;
        $theme->save();

        return $theme;
    }

    /**
     * Update the default theme in the settings.
     *
     * @param int $themeId The theme identifier
     *
     * @return collection
     */
    public static function updateDefaultThemeSetting($themeId)
    {
        $blogTheme = BlogSetting::where('key', '=', 'blog_theme_id')->first();
        $blogTheme->value = $themeId;
        $blogTheme->save();

        return $blogTheme;
    }

    /**
     * Delete a blgo theme.
     *
     * @param int $themeId
     *
     * @return collection
     */
    public static function deleteBlogTheme($themeId)
    {
        $theme = Theme::findOrFail($themeId);
        $theme->delete();

        return $theme;
    }
}
