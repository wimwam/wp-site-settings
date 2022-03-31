<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class OpeningHours
 *
 * @package Duracom\JsonLd\Schemas
 */
class OpeningHours implements SchemaInterface
{
    /**
     * @var string
     */
    protected $type = 'openingHours';

    /**
     * @var string|null
     */
    protected $monday;

    /**
     * @var string|null
     */
    protected $tuesday;

    /**
     * @var string|null
     */
    protected $wednesday;

    /**
     * @var string|null
     */
    protected $thursday;

    /**
     * @var string|null
     */
    protected $friday;

    /**
     * @var string|null
     */
    protected $saturday;

    /**
     * @var string|null
     */
    protected $sunday;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return OpeningHours
     */
    public function setType(string $type): OpeningHours
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMonday(): ?string
    {
        return $this->monday;
    }

    /**
     * @param string|null $monday
     *
     * @return OpeningHours
     */
    public function setMonday(?string $monday): OpeningHours
    {
        $this->monday = $monday;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTuesday(): ?string
    {
        return $this->tuesday;
    }

    /**
     * @param string|null $tuesday
     *
     * @return OpeningHours
     */
    public function setTuesday(?string $tuesday): OpeningHours
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWednesday(): ?string
    {
        return $this->wednesday;
    }

    /**
     * @param string|null $wednesday
     *
     * @return OpeningHours
     */
    public function setWednesday(?string $wednesday): OpeningHours
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getThursday(): ?string
    {
        return $this->thursday;
    }

    /**
     * @param string|null $thursday
     *
     * @return OpeningHours
     */
    public function setThursday(?string $thursday): OpeningHours
    {
        $this->thursday = $thursday;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFriday(): ?string
    {
        return $this->friday;
    }

    /**
     * @param string|null $friday
     *
     * @return OpeningHours
     */
    public function setFriday(?string $friday): OpeningHours
    {
        $this->friday = $friday;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSaturday(): ?string
    {
        return $this->saterday;
    }

    /**
     * @param string|null $saturday
     *
     * @return OpeningHours
     */
    public function setSaturday(?string $saturday): OpeningHours
    {
        $this->saterday = $saturday;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSunday(): ?string
    {
        return $this->sunday;
    }

    /**
     * @param string|null $sunday
     *
     * @return OpeningHours
     */
    public function setSunday(?string $sunday): OpeningHours
    {
        $this->sunday = $sunday;

        return $this;
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        $days = [];
        if ($this->getMonday()) {
            $days['Mo'] = $this->getMonday();
        }
        if ($this->getTuesday()) {
            $days['Tu'] = $this->getTuesday();
        }
        if ($this->getWednesday()) {
            $days['We'] = $this->getWednesday();
        }
        if ($this->getThursday()) {
            $days['Th'] = $this->getThursday();
        }
        if ($this->getFriday()) {
            $days['Fr'] = $this->getFriday();
        }
        if ($this->getSaturday()) {
            $days['Sa'] = $this->getSaturday();
        }
        if ($this->getSunday()) {
            $days['Su'] = $this->getSunday();
        }

        return array_merge(['@type' => 'openingHours'], $days);
    }
}
