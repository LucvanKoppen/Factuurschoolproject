<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurProductRepository")
 */
class FactuurProduct
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factuur", inversedBy="factuurProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $factuur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Producten", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\Column(type="integer")
     */
    private $aantal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuur(): ?Factuur
    {
        return $this->factuur;
    }

    public function setFactuur(?Factuur $factuur): self
    {
        $this->factuur = $factuur;

        return $this;
    }

    public function getProduct(): ?Producten
    {
        return $this->product;
    }

    public function setProduct(Producten $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }
}
