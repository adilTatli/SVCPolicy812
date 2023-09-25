<?php
declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;

class JsonPlaceholderAPI
{
    private $baseUrl = 'https://jsonplaceholder.typicode.com';
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    public function getUsers()
    {
        $response = $this->client->get('/users');
        $contents = $response->getBody()->getContents();
        return json_decode($contents, true);
    }

    public function getUserPosts($userId)
    {
        $response = $this->client->get("/posts?userId={$userId}");
        $contents = $response->getBody()->getContents();
        return json_decode($contents, true);
    }

    public function getUserTodos($userId)
    {
        $response = $this->client->get("/todos?userId={$userId}");
        $contents = (string)$response->getBody();
        return json_decode($contents, true);
    }

    public function createPost($data)
    {
        $response = $this->client->post('/posts', ['json' => $data]);
        $contents = $response->getBody()->getContents();
        return json_decode($contents, true);
    }

    public function updatePost($postId, $data)
    {
        $response = $this->client->put("/posts/{$postId}", ['json' => $data]);
        $contents = $response->getBody()->getContents();
        return json_decode($contents, true);
    }

    public function deletePost($postId)
    {
        $this->client->delete("/posts/{$postId}");
    }
}