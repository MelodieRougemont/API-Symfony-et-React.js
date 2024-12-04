<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom du produit est obligatoire.")] 
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom du produit ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "La description est obligatoire.")]
    #[Assert\Length(
        max: 2000,
        maxMessage: "La description ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $Description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le prix est obligatoire.")]
    #[Assert\Positive(message: "Le prix doit être un nombre positif.")]
    private ?float $Prix = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "La date de création est obligatoire.")]
    #[Assert\Type(
        type: \DateTimeImmutable::class,
        message: "La date doit être une instance de DateTimeImmutable."
    )]
    private ?\DateTimeImmutable $DateCreation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setID(int $ID): static
    {
        $this->ID = $ID;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $DateCreation): static
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }
}
