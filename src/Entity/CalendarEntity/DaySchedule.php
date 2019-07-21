<?php

namespace App\Entity\CalendarEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DayScheduleRepository")
 * @ORM\Table(name="day_schedule")
 */
class DaySchedule
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
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\Ur")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Ur
     */
    private $ur;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\Schedule", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Schedule
     */
    private $schedule;

    /**
     * @ORM\Column(type="string", length=10)
     *
     * @var string
     */
    private $shiftAbbreviation;


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
     * @return DaySchedule
     */
    public function setUr(Ur $ur): self
    {
        $this->ur = $ur;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Set date
     *
     * @param \DateTimeInterface $date
     *
     * @return DaySchedule
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get schedule
     *
     * @return Schedule
     */
    public function getSchedule(): Schedule
    {
        return $this->schedule;
    }

    /**
     * Set schedule
     *
     * @param Schedule $schedule
     *
     * @return DaySchedule
     */
    public function setSchedule(Schedule $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get shiftAbbreviation
     *
     * @return string
     */
    public function getShiftAbbreviation(): string
    {
        return $this->shiftAbbreviation;
    }

    /**
     * Set shiftAbbreviation
     *
     * @param string $shiftAbbreviation
     *
     * @return DaySchedule
     */
    public function setShiftAbbreviation(string $shiftAbbreviation): self
    {
        $this->shiftAbbreviation = $shiftAbbreviation;

        return $this;
    }
}
