<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PostTemplates
{
    /**
     * Get all the post templates as a collection.
     *
     * @return array
     */
    public static function list($type = 'post')
    {
        $dir = 'post-layouts';
        if ($type != 'post') {
            $dir = $type . '-layouts';
        }
        $postTemplatefilesList = collect([]);
        $postTemplatefiles = Storage::disk($dir)->files('');

        foreach ($postTemplatefiles as $postTemplatefile) {
            $name = substr($postTemplatefile, 0, strpos($postTemplatefile, '.blade.php'));
            $postTemplatefilesList[] = [
                'name' => $name,
                'path' => 'blog.' . $dir . '.' . $name,
            ];
        }

        return $postTemplatefilesList;
    }
}
