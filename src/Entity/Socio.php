<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

use App\Repository\SocioRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SocioRepository::class)
 */
class Socio
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
    private $nome;

    /**
     * @ORM\Column(type="float")
     */
    private $participacao;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="socios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    // Getters e Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getParticipacao(): ?float
    {
        return $this->participacao;
    }

    public function setParticipacao(float $participacao): self
    {
        $this->participacao = $participacao;
        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;
        return $this;
    }
}
