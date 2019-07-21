<?php

namespace App\Entity\RoEntity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ur")
 */
class Ur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint", options={"unsigned":true})
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     *
     * @var string;
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="string", length=45)
     *
     * @var string;
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RoEntity\Line", mappedBy="ur")
     *
     * @var Line[]
     */
    private $lines;

    /**
     * Ur constructor.
     */
    public function __construct()
    {
        $this->lines        = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get abbreviation
     *
     * @return string
     */
    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * Set abbreviation
     *
     * @param string $abbreviation
     *
     * @return Ur
     */
    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Ur
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get lines
     *
     * @return Collection|Line[]
     */
    public function getLines(): Collection
    {
        return $this->lines;
    }

    /**
     * Add line
     *
     * @param Line $line
     *
     * @return Ur
     */
    public function addLine(Line $line): self
    {
        if (!$this->lines->contains($line)) {
            $this->lines[] = $line;
            $line->setUr($this);
        }

        return $this;
    }

    /**
     * Remove line
     *
     * @param Line $line
     *
     * @return Ur
     */
    public function removeLine(Line $line): self
    {
        if ($this->lines->contains($line)) {
            $this->lines->removeElement($line);
        }

        return $this;
    }

}
