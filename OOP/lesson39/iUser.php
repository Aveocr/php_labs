<?php

interface iUser
{
    public function __construct(string $name, int $age);

    public function getName(): string;

    public function getAge(): int;
}