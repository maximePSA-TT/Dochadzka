<?php

namespace App\Entity\RoEntity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="line")
 */
class Line
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
     * @ORM\Column(type="string", length=45)
     *
     * @var string;
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RoEntity\Ur", inversedBy="lines")
     * @ORM\JoinColumn(name="ur_id", referencedColumnName="id", nullable=false)
     *
     * @var Ur
     */
    private $ur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RoEntity\Uep", mappedBy="line")
     *
     * @var Uep[]
     */
    private $ueps;

    public function __construct()
    {
        $this->ueps = new ArrayCollection();
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
     * @return Line
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get ur
     *
     * @return Ur
     */
    public function getUr(): Ur
    {
        return $this->ur;
    }

    /**
     * Set ur
     *
     * @param Ur $ur
     *
     * @return Line
     */
    public function setUr(Ur $ur): self
    {
        $this->ur = $ur;

        return $this;
    }

    /**
     * Get ueps
     *
     * @return Collection|Line[]
     */
    public function getUeps(): Collection
    {
        return $this->ueps;
    }

    /**
     * Add uep
     *
     * @param Uep $uep
     *
     * @return Line
     */
    public function addUep(Uep $uep): self
    {
        if (!$this->ueps->contains($uep)) {
            $this->ueps[] = $uep;
            $uep->setLine($this);
        }

        return $this;
    }

    /**
     * Remove uep
     *
     * @param Uep $uep
     *
     * @return Line
     */
    public function removeUep(Uep $uep): self
    {
        if ($this->ueps->contains($uep)) {
            $this->ueps->removeElement($uep);
        }

        return $this;
    }
}
