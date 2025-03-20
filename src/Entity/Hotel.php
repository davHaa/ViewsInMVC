<?php

namespace ViewsInMVC\Entity;

class Hotel
{
    private string $name;
    private string $image;
    private string $description;

    public function __construct(string $name, string $image, string $description)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}
