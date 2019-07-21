<?php
/**
 * Created by PhpStorm.
 * User: U564705
 * Date: 17/04/2019
 * Time: 08:49
 */

namespace App\Entity\CalendarEntity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="schedule")
 */
class Schedule
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
     * @ORM\Column(type="smallint", nullable=true, options={"unsigned":true})
     *
     * @var int
     */
    private $start;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"unsigned":true})
     *
     * @var int
     */
    private $end;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CalendarEntity\ShiftType")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var ShiftType
     */
    private $shiftType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CalendarEntity\ScheduleBreak", mappedBy="schedule")
     *
     * @var ScheduleBreak[]|Collection
     */
    private $breaks;

    /**
     * Schedule constructor.
     */
    public function __construct()
    {
        $this->breaks = new ArrayCollection();
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
     * Set id
     *
     * @param int $id
     *
     * @return Schedule
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get start
     *
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * Set start
     *
     * @param int $start
     *
     * @return Schedule
     */
    public function setStart(int $start): self
    {
        $this->start = $start;
        return $this;
    }

    /**
     * Get end
     *
     * @return int
     */
    public function getEnd(): int
    {
        return $this->end;
    }

    /**
     * Set end
     *
     * @param int $end
     *
     * @return Schedule
     */
    public function setEnd(int $end): self
    {
        $this->end = $end;
        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Schedule
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;
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
     * @return Schedule
     */
    public function setShiftType(ShiftType $shiftType): self
    {
        $this->shiftType = $shiftType;

        return $this;
    }

    /**
     * Get breaks
     *
     * @return ScheduleBreak[]|Collection
     */
    public function getBreaks(): Collection
    {
        return $this->breaks;
    }
}
