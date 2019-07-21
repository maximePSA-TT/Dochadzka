<?php

namespace App\Entity\RoEntity;

use App\Repository\UepGoalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="uep")
 */
class Uep
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
     * @ORM\ManyToOne(targetEntity="App\Entity\RoEntity\Line", inversedBy="ueps")
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id", nullable=false)
     *
     * @var Line
     */
    private $line;

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
     * @return Uep
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get line
     *
     * @return Line
     */
    public function getLine(): Line
    {
        return $this->line;
    }

    /**
     * Set line
     *
     * @param Line $line
     *
     * @return Uep
     */
    public function setLine(Line $line): self
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Get ur
     *
     * @return Ur
     */
    public function getUr(): Ur
    {
        return $this->line->getUr();
    }
}
