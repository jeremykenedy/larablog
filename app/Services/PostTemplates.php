<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PostTemplates
{
    /**
     * Get all the post templates as a collection
     *
     * @return
     */
    public static function list()
    {
        $postTemplatefilesList  = collect([]);
        $postTemplatefiles      = Storage::disk('post-layouts')->files('');

        foreach ($postTemplatefiles as $postTemplatefile) {

            $name = substr($postTemplatefile, 0, strpos($postTemplatefile, '.blade.php'));
            $postTemplatefilesList[] = [
                'name' => $name,
                'path' => 'blog.post-layouts.' . $name
            ];

        }

        return $postTemplatefilesList;
    }

}
