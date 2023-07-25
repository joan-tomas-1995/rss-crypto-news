<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use willvincent\Feeds\Facades\Feeds;

class FeedController extends Controller
{

    public function demo()
    {

        // URLs de los feeds
        $feedUrls = [
            'https://cointelegraph.com/rss',
            'https://decrypt.co/feed',
            'https://crypto.news/feed/',
            "https://beincrypto.com/feed/",
            "https://cryptoslate.com/feed/",
            "https://ambcrypto.com/feed/",
            "https://coingape.com/feed/",
            "https://dailyhodl.com/feed/"
        ];

        // Array para almacenar la información de los feeds
        $feeds = [];

        foreach ($feedUrls as $url) {
            // Create a feed instance from the URL
            $feed = \Feeds::make($url);

            // Get the first 5 items from the feed
            $items = collect($feed->get_items())->slice(0, 5);


            // Get the image tag from the feed
            $imageTag = $feed->get_channel_tags('', 'image');

            // Initialize $imageUrl as null
            $imageUrl = null;

            // If $imageTag is not null, get the image URL from the image tag
            if ($imageTag !== null) {
                $imageUrl = $imageTag[0]['child']['']['url'][0]['data'];
            }

            // Add the feed information to the $feeds array
            $feeds[] = array(
                'title'     => $feed->get_title(),     // Feed title
                'permalink' => $feed->get_permalink(), // Feed permalink
                'items'     => $items,                 // Feed items
                'image'     => $imageUrl               // Feed image
            );
        }
        // Retornar la vista 'feed' con los datos de los feeds
        return view('feed', ['feeds' => $feeds]);
    }
}
