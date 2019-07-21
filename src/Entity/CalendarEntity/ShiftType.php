<?php

namespace App\Entity\CalendarEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shift_type")
 */
class ShiftType
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
     * @ORM\Column(type="text", length=10)
     *
     * @var string
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="text", length=45)
     *
     * @var string
     */
    private $name;

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
     * @return ShiftType
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
     * @return ShiftType
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
