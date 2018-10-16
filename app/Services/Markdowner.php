<?php

namespace App\Services;

use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

class Markdowner
{
    /**
     * Prepare content to be saved as HTML.
     *
     * @param string $text
     *
     * @return string
     */
    public function toHTML($text)
    {
        $text = $this->preTransformText($text);
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        $text = $this->postTransformText($text);

        return $text;
    }

    /**
     * Pre transform text.
     *
     * @param string
     *
     * @return string
     */
    protected function preTransformText($text)
    {
        return $text;
    }

    /**
     * Posts a transform text.
     *
     * @param string
     *
     * @return string
     */
    protected function postTransformText($text)
    {
        return $text;
    }
}
