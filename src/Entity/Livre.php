<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?auteurs $auteurs = null;

    #[ORM\ManyToOne(inversedBy: 'livre')]
    private ?FicheEmprunt $ficheEmprunt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->titre = strtoupper($Titre);

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getAuteurs(): ?auteurs
    {
        return $this->auteurs;
    }

    public function setAuteurs(?auteurs $auteurs): static
    {
        $this->auteurs = $auteurs;

        return $this;
    }

    public function getFicheEmprunt(): ?FicheEmprunt
    {
        return $this->ficheEmprunt;
    }

    public function setFicheEmprunt(?FicheEmprunt $ficheEmprunt): static
    {
        $this->ficheEmprunt = $ficheEmprunt;

        return $this;
    }
}
