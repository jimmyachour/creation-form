<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContractTypeRepository")
 */
class ContractType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contract", mappedBy="type", orphanRemoval=true)
     */
    private $contracts;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ContractAdditionalProperty")
     */
    private $additionalProperties;


    const NEW_TYPE = 0;

    public function __construct()
    {
        $this->contracts = new ArrayCollection();
        $this->additionalProperties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Contract[]
     */
    public function getContracts(): Collection
    {
        return $this->contracts;
    }

    public function addContract(Contract $contract): self
    {
        if (!$this->contracts->contains($contract)) {
            $this->contracts[] = $contract;
            $contract->setType($this);
        }

        return $this;
    }

    public function removeContract(Contract $contract): self
    {
        if ($this->contracts->contains($contract)) {
            $this->contracts->removeElement($contract);
            // set the owning side to null (unless already changed)
            if ($contract->getType() === $this) {
                $contract->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContractAdditionalProperty[]
     */
    public function getAdditionalProperties(): Collection
    {
        return $this->additionalProperties;
    }

    public function addAdditionalProperty(ContractAdditionalProperty $additionalProperty): self
    {
        if (!$this->additionalProperties->contains($additionalProperty)) {
            $this->additionalProperties[] = $additionalProperty;
        }

        return $this;
    }

    public function removeAdditionalProperty(ContractAdditionalProperty $additionalProperty): self
    {
        if ($this->additionalProperties->contains($additionalProperty)) {
            $this->additionalProperties->removeElement($additionalProperty);
        }

        return $this;
    }

    public function __toString() {
        return $this->name;
    }

}
