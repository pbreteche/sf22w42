<?php

namespace App\HttpLoader;

use App\Entity\Post;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PostCommentLoader
{
    private CacheInterface $cache;
    private HttpClientInterface $client;
    private string $webApiEndpoint;

    public function __construct(
        CacheInterface $cache,
        HttpClientInterface $client,
        string $webApiEndpoint
    ) {
        $this->cache = $cache;
        $this->client = $client;
        $this->webApiEndpoint = $webApiEndpoint;
    }

    public function loadForPost(Post $post): array
    {
        return $this->cache->get(
            'post.'.$post->getId().'.comments',
            function (ItemInterface $item) use ($post) {
                $item->expiresAfter(3600); // TTL = 01:00
                // Stub : retrieve from web API
                // $jsonData = $this->client->request('GET', $this->webApiEndpoint.'/'.$post->getId());
                $data = [
                    'First comment',
                    'Another comment',
                ];

                return $data;
            }
        );
    }
}