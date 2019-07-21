<?php

namespace App\Entity\CalendarEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="planned_break")
 */
class PlannedBreak
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
     * @ORM\Column(type="time")
     *
     * @var \DateTime
     */
    private $start;

    /**
     * @ORM\Column(type="time")
     *
     * @var \DateTime
     */
    private $end;

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
     * Get start
     *
     * @return \DateTimeInterface
     */
    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    /**
     * Set start
     *
     * @param \DateTimeInterface $start
     *
     * @return PlannedBreak
     */
    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTimeInterface
     */
    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    /**
     * Set end
     *
     * @param \DateTimeInterface $end
     *
     * @return PlannedBreak
     */
    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }
}
