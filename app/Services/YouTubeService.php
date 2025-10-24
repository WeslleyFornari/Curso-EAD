<?php
namespace App\Services;

use Google\Client;
use Google\Service\YouTube;

class YouTubeService
{
    protected $client;
    protected $youtube;
    protected $channelId;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setDeveloperKey(ead()->configuracoes->google_key);
        $this->channelId = ead()->configuracoes->youtube_channel;
        $this->youtube = new YouTube($this->client);
    }

    public function getVideosFromChannel($maxResults = 10)
    {
        $response = $this->youtube->search->listSearch('snippet', [
            'channelId' =>  $this->channelId,
            'maxResults' => $maxResults,
            'order' => 'date'
        ]);

        return $response->getItems();
    }
}
