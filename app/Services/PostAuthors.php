<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostAuthors
{
    /**
     * Get all the authors as a collection
     *
     * @return
     */
    public static function all()
    {
        $usernames              = User::userNames()->get();
        $authors                = Post::authors()->get();
        $allAvailableAuthors    = collect([]);

        foreach ($authors as $author) {
            $allAvailableAuthors[] = $author->author;
        }
        foreach ($usernames as $username) {
            $allAvailableAuthors[] = $username->name;
        }

        return $allAvailableAuthors->unique()->sort()->all();
    }
}
