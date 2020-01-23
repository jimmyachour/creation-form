<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ContractRepository")
 */
class Contract
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
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createDateTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedDateTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ContractType", inversedBy="contracts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->createDateTime = new DateTime();
        $this->updatedDateTime = new DateTime();

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreateDateTime(): ?\DateTimeInterface
    {
        return $this->createDateTime;
    }

    public function setCreateDateTime(\DateTimeInterface $createDateTime): self
    {
        $this->createDateTime = substr($createDateTime,0,10);

        return $this;
    }

    public function getUpdatedDateTime(): ?\DateTimeInterface
    {
        return $this->updatedDateTime;
    }

    public function setUpdatedDateTime(?\DateTimeInterface $updatedDateTime): self
    {
        $this->updatedDateTime = $updatedDateTime;

        return $this;
    }

    public function getType(): ?ContractType
    {
        return $this->type;
    }

    public function setType(?ContractType $type): self
    {
        $this->type = $type;

        return $this;
    }
    public function __toString() {
        return $this->name;
    }

}
