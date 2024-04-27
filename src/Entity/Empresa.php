<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EmpresaRepository::class)
 */
class Empresa
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
     * @ORM\Column(type="string", length=18)
     */
    private $cnpj;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $endereco;

    /**
     * @ORM\OneToMany(targetEntity=Socio::class, mappedBy="empresa")
     */
    private $socios;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tituloEstabelecimento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $atividadeEconomicaPrincipal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $naturezaJuridica;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logradouro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complemento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bairroDistrito;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $municipio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cep;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefone;

    public function __construct()
    {
        $this->socios = new ArrayCollection();
    }

    // Getters e Setters para as propriedades $id, $nome, $cnpj e $endereco

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

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): self
    {
        $this->endereco = $endereco;
        return $this;
    }
    // Getters e setters para o título do estabelecimento (nome de fantasia)
    public function getTituloEstabelecimento(): ?string
    {
        return $this->tituloEstabelecimento;
    }

    public function setTituloEstabelecimento(?string $tituloEstabelecimento): self
    {
        $this->tituloEstabelecimento = $tituloEstabelecimento;
        return $this;
    }

    // Getters e setters para atividade econômica principal
    public function getAtividadeEconomicaPrincipal(): ?string
    {
        return $this->atividadeEconomicaPrincipal;
    }

    public function setAtividadeEconomicaPrincipal(?string $atividadeEconomicaPrincipal): self
    {
        $this->atividadeEconomicaPrincipal = $atividadeEconomicaPrincipal;
        return $this;
    }

    // Getters e setters para a natureza jurídica
    public function getNaturezaJuridica(): ?string
    {
        return $this->naturezaJuridica;
    }

    public function setNaturezaJuridica(?string $naturezaJuridica): self
    {
        $this->naturezaJuridica = $naturezaJuridica;
        return $this;
    }

    // Getters e setters para logradouro
    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $logradouro): self
    {
        $this->logradouro = $logradouro;
        return $this;
    }

    // Getters e setters para número
    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    // Getters e setters para complemento
    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;
        return $this;
    }

    // Getters e setters para bairro/distrito
    public function getBairroDistrito(): ?string
    {
        return $this->bairroDistrito;
    }

    public function setBairroDistrito(?string $bairroDistrito): self
    {
        $this->bairroDistrito = $bairroDistrito;
        return $this;
    }

    // Getters e setters para município
    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(?string $municipio): self
    {
        $this->municipio = $municipio;
        return $this;
    }

    // Getters e setters para UF
    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): self
    {
        $this->uf = $uf;
        return $this;
    }

    // Getters e setters para CEP
    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): self
    {
        $this->cep = $cep;
        return $this;
    }

    // Getters e setters para email
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    // Getters e setters para telefone
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;
        return $this;
    }


    // Getters e Setters para a coleção de Sócios

    /**
     * @return Collection|Socio[]
     */
    public function getSocios(): Collection
    {
        return $this->socios;
    }

    public function addSocio(Socio $socio): self
    {
        if (!$this->socios->contains($socio)) {
            $this->socios[] = $socio;
            $socio->setEmpresa($this);
        }

        return $this;
    }

    public function removeSocio(Socio $socio): self
    {
        if ($this->socios->removeElement($socio)) {
            // set the owning side to null (unless already changed)
            if ($socio->getEmpresa() === $this) {
                $socio->setEmpresa(null);
            }
        }

        return $this;
    }
}
