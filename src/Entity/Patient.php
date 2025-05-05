<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $id_patient = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_naiss = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_entree = null;

    #[ORM\ManyToOne(targetEntity: Medecin::class, inversedBy: 'patients')]
    #[ORM\JoinColumn(name: "medecin_id", referencedColumnName: "id_medecin", nullable: true)]
    private ?Medecin $medecin_id = null;

    public function getIdPatient(): ?int
    {
        return $this->id_patient;
    }

    public function getId(): ?int
    {
        return $this->id_patient;
    }



    public function setIdPatient(int $id_patient): static
    {
        $this->id_patient = $id_patient;

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

    public function getDateNaiss(): ?\DateTime
    {
        return $this->date_naiss;
    }

    public function setDateNaiss(\DateTime $date_naiss): static
    {
        $this->date_naiss = $date_naiss;

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

    public function getDateEntree(): ?\DateTime
    {
        return $this->date_entree;
    }

    public function setDateEntree(\DateTime $date_entree): static
    {
        $this->date_entree = $date_entree;

        return $this;
    }

    public function getMedecinId(): ?Medecin
    {
        return $this->medecin_id;
    }

    public function setMedecinId(?Medecin $medecin_id): static
    {
        $this->medecin_id = $medecin_id;

        return $this;
    }
}
