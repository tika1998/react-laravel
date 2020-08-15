<?php

namespace App\Services;
use App\Contract\NewsInterface;
use App\News;

class NewsServices implements NewsInterface
{
    private $news;

    public function __construct()
    {
        $this->news = new News();
    }

    public function getNews()
    {
        // TODO: Implement getNews() method.
        return $this->news::with('user')->where('user_id', 1)->get();
    }
}
