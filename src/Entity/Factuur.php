<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRepository")
 */
class Factuur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="factuurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $klant;

    /**
     * @ORM\Column(type="date")
     */
    private $verval_datum;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="integer")
     */
    private $nummer;

    /**
     * @ORM\Column(type="float")
     */
    private $korting;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurProduct", mappedBy="factuur")
     */
    private $factuurProducts;

    public function __construct()
    {
        $this->factuurProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlant(): ?Klant
    {
        return $this->klant;
    }

    public function setKlant(?Klant $klant): self
    {
        $this->klant = $klant;

        return $this;
    }

    public function getVervalDatum(): ?\DateTimeInterface
    {
        return $this->verval_datum;
    }

    public function setVervalDatum(\DateTimeInterface $verval_datum): self
    {
        $this->verval_datum = $verval_datum;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getNummer(): ?int
    {
        return $this->nummer;
    }

    public function setNummer(int $nummer): self
    {
        $this->nummer = $nummer;

        return $this;
    }

    public function getKorting(): ?float
    {
        return $this->korting;
    }

    public function setKorting(float $korting): self
    {
        $this->korting = $korting;

        return $this;
    }

    /**
     * @return Collection|FactuurProduct[]
     */
    public function getFactuurProducts(): Collection
    {
        return $this->factuurProducts;
    }

    public function addFactuurProduct(FactuurProduct $factuurProduct): self
    {
        if (!$this->factuurProducts->contains($factuurProduct)) {
            $this->factuurProducts[] = $factuurProduct;
            $factuurProduct->setFactuur($this);
        }

        return $this;
    }

    public function removeFactuurProduct(FactuurProduct $factuurProduct): self
    {
        if ($this->factuurProducts->contains($factuurProduct)) {
            $this->factuurProducts->removeElement($factuurProduct);
            // set the owning side to null (unless already changed)
            if ($factuurProduct->getFactuur() === $this) {
                $factuurProduct->setFactuur(null);
            }
        }

        return $this;
    }
}
