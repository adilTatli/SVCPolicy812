<?php
declare(strict_types=1);

use App\JsonPlaceholderAPI;

include_once __DIR__ . '/vendor/autoload.php';

$api = new JsonPlaceholderAPI();

$users = $api->getUsers();
echo "<pre>";
print_r($users);
echo "<pre>";

$userPosts = $api->getUserPosts(1);
echo "<pre>";
print_r($userPosts);
echo "<pre>";

$userTodos = $api->getUserTodos(1);
echo "<pre>";
print_r($userTodos);
echo "<pre>";

$newPostData = [
    'userId' => 1,
    'title' => 'Новый пост',
    'body' => 'Содержание нового поста',
];
$newPost = $api->createPost($newPostData);
echo "<pre>";
print_r($newPost);
echo "<pre>";

$updatePostData = [
    'title' => 'Обновленный заголовок',
    'body' => 'Обновленное содержание',
];
$updatedPost = $api->updatePost(1, $updatePostData);
echo "<pre>";
print_r($updatedPost);
echo "<pre>";

$api->deletePost(1);

