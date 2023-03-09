<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_7 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_8 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_9 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_10 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_11 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_12 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_13 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergenes_14 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Regimes_1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Regimes_2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Regimes_3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Regimes_4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Regimes_5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Regimes_6 = null;

    #[ORM\ManyToMany(targetEntity: Allergenes::class, inversedBy: 'users')]
    private Collection $allerg;

    #[ORM\ManyToMany(targetEntity: Regime::class, inversedBy: 'users')]
    private Collection $Regimes;

    public function __construct()
    {
        $this->allerg = new ArrayCollection();
        $this->Regimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


  
    public function getRegimes1(): ?string
    {
        return $this->Regimes_1;
    }

    public function setRegimes1(?string $Regimes_1): self
    {
        $this->Regimes_1 = $Regimes_1;

        return $this;
    }

    public function getRegimes2(): ?string
    {
        return $this->Regimes_2;
    }

    public function setRegimes2(?string $Regimes_2): self
    {
        $this->Regimes_2 = $Regimes_2;

        return $this;
    }

    public function getRegimes3(): ?string
    {
        return $this->Regimes_3;
    }

    public function setRegimes3(?string $Regimes_3): self
    {
        $this->Regimes_3 = $Regimes_3;

        return $this;
    }

    public function getRegimes4(): ?string
    {
        return $this->Regimes_4;
    }

    public function setRegimes4(?string $Regimes_4): self
    {
        $this->Regimes_4 = $Regimes_4;

        return $this;
    }

    public function getRegimes5(): ?string
    {
        return $this->Regimes_5;
    }

    public function setRegimes5(?string $Regimes_5): self
    {
        $this->Regimes_5 = $Regimes_5;

        return $this;
    }

    public function getRegimes6(): ?string
    {
        return $this->Regimes_6;
    }

    public function setRegimes6(?string $Regimes_6): self
    {
        $this->Regimes_6 = $Regimes_6;

        return $this;
    }

    /**
     * @return Collection<int, Allergenes>
     */
    public function getAllerg(): Collection
    {
        return $this->allerg;
    }

    public function addAllerg(Allergenes $allerg): self
    {
        if (!$this->allerg->contains($allerg)) {
            $this->allerg->add($allerg);
        }

        return $this;
    }

    public function removeAllerg(Allergenes $allerg): self
    {
        $this->allerg->removeElement($allerg);

        return $this;
    }

    /**
     * @return Collection<int, Regime>
     */
    public function getRegimes(): Collection
    {
        return $this->Regimes;
    }

    public function addRegime(Regime $regime): self
    {
        if (!$this->Regimes->contains($regime)) {
            $this->Regimes->add($regime);
        }

        return $this;
    }

    public function removeRegime(Regime $regime): self
    {
        $this->Regimes->removeElement($regime);

        return $this;
    }
}
