<?php

namespace App\Entity;

use App\Repository\RecettesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecettesRepository::class)]
class Recettes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $temps_de_preparation = null;

    #[ORM\Column]
    private ?int $temps_de_cuisson = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ingedrients = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $etapes = null;

    #[ORM\ManyToMany(targetEntity: Allergenes::class, inversedBy: 'recettes')]
    private Collection $Listes_des_allergenes;

    #[ORM\ManyToMany(targetEntity: Regime::class, inversedBy: 'recettes')]
    private Collection $Liste_de_regimes;

    #[ORM\Column]
    private ?int $Temps_de_repos = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Patients = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->Listes_des_allergenes = new ArrayCollection();
        $this->Liste_de_regimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTempsDePreparation(): ?int
    {
        return $this->temps_de_preparation;
    }

    public function setTempsDePreparation(int $temps_de_preparation): self
    {
        $this->temps_de_preparation = $temps_de_preparation;

        return $this;
    }

    public function getTempsDeCuisson(): ?int
    {
        return $this->temps_de_cuisson;
    }

    public function setTempsDeCuisson(int $temps_de_cuisson): self
    {
        $this->temps_de_cuisson = $temps_de_cuisson;

        return $this;
    }

    public function getingedrients(): ?string
    {
        return $this->ingedrients;
    }

    public function setingedrients(string $ingedrients): self
    {
        $this->ingedrients = $ingedrients;

        return $this;
    }

    public function getEtapes(): ?string
    {
        return $this->etapes;
    }

    public function setEtapes(string $etapes): self
    {
        $this->etapes = $etapes;

        return $this;
    }

    /**
     * @return Collection<int, Allergenes>
     */
    public function getListesDesAllergenes(): Collection
    {
        return $this->Listes_des_allergenes;
    }

    public function addListesDesAllergene(Allergenes $listesDesAllergene): self
    {
        if (!$this->Listes_des_allergenes->contains($listesDesAllergene)) {
            $this->Listes_des_allergenes->add($listesDesAllergene);
        }

        return $this;
    }

    public function removeListesDesAllergene(Allergenes $listesDesAllergene): self
    {
        $this->Listes_des_allergenes->removeElement($listesDesAllergene);

        return $this;
    }

    /**
     * @return Collection<int, Regime>
     */
    public function getListeDeRegimes(): Collection
    {
        return $this->Liste_de_regimes;
    }

    public function addListeDeRegime(Regime $listeDeRegime): self
    {
        if (!$this->Liste_de_regimes->contains($listeDeRegime)) {
            $this->Liste_de_regimes->add($listeDeRegime);
        }

        return $this;
    }

    public function removeListeDeRegime(Regime $listeDeRegime): self
    {
        $this->Liste_de_regimes->removeElement($listeDeRegime);

        return $this;
    }

    public function getTempsDeRepos(): ?int
    {
        return $this->Temps_de_repos;
    }

    public function setTempsDeRepos(int $Temps_de_repos): self
    {
        $this->Temps_de_repos = $Temps_de_repos;

        return $this;
    }

    public function isPatients(): ?bool
    {
        return $this->Patients;
    }

    public function setPatients(?bool $Patients): self
    {
        $this->Patients = $Patients;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
