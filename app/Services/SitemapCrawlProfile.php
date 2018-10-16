<?php

namespace App\Services;

use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlProfile;

class SitemapCrawlProfile extends CrawlProfile
{
    /**
     * Sitemap Cralwer Custom Crawl Profile.
     *
     * @param \Psr\Http\Message\UriInterface $url
     *
     * @return bool
     */
    public function shouldCrawl(UriInterface $url): bool
    {
        if ($url->getHost() !== 'localhost') {
            return false;
        }

        return $url->getPath() === '/';
    }
}
