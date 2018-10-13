<?php

namespace App\Services;

use Spatie\Crawler\CrawlProfile;
use Psr\Http\Message\UriInterface;

class SitemapCrawlProfile extends CrawlProfile
{
    /**
     * Sitemap Cralwer Custom Crawl Profile
     *
     * @param \Psr\Http\Message\UriInterface $url
     *
     * @return boolean
     */
    public function shouldCrawl(UriInterface $url): bool
    {
        if ($url->getHost() !== 'localhost') {
            return false;
        }

        return $url->getPath() === '/';
    }
}
