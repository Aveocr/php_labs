<?php


require_once 'Post.php';

class Employee
{
    private string $name;
    private string $surname;
    private Post $post;

    public function __construct(string $name, string $surname, Post $post)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->post = $post;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getSurname(): string
    {
        return $this->surname;
    }


    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }


    public function getPost(): Post
    {
        return $this->post;
    }

    public function changePost(Post $post): void
    {
        $this->post = $post;
    }

}