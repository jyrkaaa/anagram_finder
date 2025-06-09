<?php

namespace App\Entity;

use AllowDynamicProperties;
use App\Methods\SortString;
use App\Repository\WordRepository;
use Doctrine\ORM\Mapping as ORM;

#[AllowDynamicProperties] #[ORM\Entity(repositoryClass: WordRepository::class)]
class Word
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $sorted_key = null;

    public function __construct(string $name)
    {
        $this->name = strtolower($name);
        $this->sorted_key = $this->SortWord($name);
    }
    private function sortWord(string $word): string
    {
        return SortString::sort($word);
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSortedKey(): ?string
    {
        return $this->sorted_key;
    }

    public function setSortedKey(string $sorted_key): static
    {
        $this->sorted_key = $sorted_key;

        return $this;
    }
}
