<?php

namespace ViewsInMVC\Entity;

class Hotel
{
    private string $name;
    private string $image;
    private string $description;
    private float $rating;

    public function __construct(string $name, string $image, string $description, float $rating)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->rating = $rating;
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

    public function getRating(): float
    {
        return $this->rating;
    }
}
