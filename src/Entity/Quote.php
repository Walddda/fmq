<?php

namespace App\Entity;

use App\Repository\QuoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuoteRepository::class)
 */
class Quote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $character;

    /**
     * @ORM\ManyToOne(targetEntity=movie::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $movie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCharacter(): ?string
    {
        return $this->character;
    }

    public function setCharacter(?string $character): self
    {
        $this->character = $character;

        return $this;
    }

    public function getMovie(): ?string
    {
        return $this->movie;
    }

    public function setMovie(?string $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function __toString()
    {
        return $this->getText();
    }
}
