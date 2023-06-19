<?php

namespace App\Service;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterService
{
    private $twitter;


    public function __construct(string $consumerKey, string $consumerSecret, string $accessToken, string $accessTokenSecret)
    {
        $this->twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
    }

    public function createLoginUrl(): string
    {
        $token = $this->twitter->oauth('oauth/request_token', ['oauth_callback' => 'http://your_callback_url']);

        $url = $this->twitter->url('oauth/authorize', ['oauth_token' => $token['oauth_token']]);

        return $url;
    }
}
