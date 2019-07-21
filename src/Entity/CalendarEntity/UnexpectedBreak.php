<?php

namespace App\Entity\CalendarEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="unexpected_break")
 */
class UnexpectedBreak
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true})
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $forDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\Ur")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Ur
     */
    private $ur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\ShiftType")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var ShiftType
     */
    private $shiftType;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\PlannedBreak")
     *
     * @var PlannedBreak|null
     */
    private $originalPlanedBreak;

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
     * Get forDate
     *
     * @return \DateTimeInterface
     */
    public function getForDate(): \DateTimeInterface
    {
        return $this->forDate;
    }

    /**
     * Set forDate
     *
     * @param \DateTimeInterface $forDate
     *
     * @return UnexpectedBreak
     */
    public function setForDate(\DateTimeInterface $forDate): self
    {
        $this->forDate = $forDate;

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
     * @return UnexpectedBreak
     */
    public function setUr(Ur $ur): self
    {
        $this->ur = $ur;

        return $this;
    }

    /**
     * Get shiftType
     *
     * @return ShiftType
     */
    public function getShiftType(): ShiftType
    {
        return $this->shiftType;
    }

    /**
     * Set shiftType
     *
     * @param ShiftType $shiftType
     *
     * @return UnexpectedBreak
     */
    public function setShiftType(ShiftType $shiftType): self
    {
        $this->shiftType = $shiftType;

        return $this;
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
     * @return UnexpectedBreak
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
     * @return UnexpectedBreak
     */
    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get originalPlanedBreak
     *
     * @return PlannedBreak|null
     */
    public function getOriginalPlanedBreak(): ?PlannedBreak
    {
        return $this->originalPlanedBreak;
    }

    /**
     * Set originalPlanedBreak
     *
     * @param PlannedBreak|null $originalPlanedBreak
     *
     * @return UnexpectedBreak
     */
    public function setOriginalPlanedBreak(?PlannedBreak $originalPlanedBreak): self
    {
        $this->originalPlanedBreak = $originalPlanedBreak;

        return $this;
    }
}
