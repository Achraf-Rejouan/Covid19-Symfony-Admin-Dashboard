<?php

namespace App\Entity;

use App\Repository\MedecinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedecinRepository::class)]
class Medecin
{

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]

    private ?int $id_medecin = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $photoFilename = null;

    /**
     * @var Collection<int, Patient>
     */
    #[ORM\OneToMany(targetEntity: Patient::class, mappedBy: 'medecin_id')]
    private Collection $patients;

    public function __construct()
    {
        $this->patients = new ArrayCollection();
    }

    public function getIdMedecin(): ?int
    {
        return $this->id_medecin;
    }

    public function getId(): ?int
    {
        return $this->id_medecin;
    }


    public function setIdMedecin(int $id_medecin): static
    {
        $this->id_medecin = $id_medecin;

        return $this;
    }

    public function getNomPrenom(): ?string
    {
        return $this->nom_prenom;
    }

    public function setNomPrenom(string $nom_prenom): static
    {
        $this->nom_prenom = $nom_prenom;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, Patient>
     */
    public function getPatients(): Collection
    {
        return $this->patients;
    }

    public function addPatient(Patient $patient): static
    {
        if (!$this->patients->contains($patient)) {
            $this->patients->add($patient);
            $patient->setMedecinId($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): static
    {
        if ($this->patients->removeElement($patient)) {
            if ($patient->getMedecinId() === $this) {
                $patient->setMedecinId(null);
            }
        }

        return $this;
    }

    public function getPhotoFilename(): ?string
    {
        return $this->photoFilename;
    }

    public function getPhoto(): ?string
    {
        return $this->photoFilename;
    }


    public function setPhotoFilename(?string $photoFilename): self
    {
        $this->photoFilename = $photoFilename;
        return $this;
    }
}
