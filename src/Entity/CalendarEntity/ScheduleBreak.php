<?php

namespace App\Entity\CalendarEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="schedule_break")
 */
class ScheduleBreak
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
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\Schedule", inversedBy="breaks")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Schedule
     */
    private $schedule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\PlannedBreak")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var PlannedBreak
     */
    private $break;

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
     * @return ScheduleBreak
     */
    public function setSchedule(Schedule $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get break
     *
     * @return PlannedBreak
     */
    public function getBreak(): PlannedBreak
    {
        return $this->break;
    }

    /**
     * Set break
     *
     * @param PlannedBreak $break
     *
     * @return ScheduleBreak
     */
    public function setBreak(PlannedBreak $break): self
    {
        $this->break = $break;

        return $this;
    }
}
