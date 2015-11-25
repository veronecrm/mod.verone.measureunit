<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\MeasureUnit\ORM;

use CRM\ORM\Entity;

class MeasureUnit extends Entity
{
    protected $id;
    protected $unit;
    protected $name;
    protected $allowFloat;

    /**
     * Gets the id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the $id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the unit.
     *
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Sets the $unit.
     *
     * @param mixed $unit the unit
     *
     * @return self
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Gets the name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the $name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the allowFloat.
     *
     * @return mixed
     */
    public function getAllowFloat()
    {
        return $this->allowFloat;
    }

    /**
     * Sets the $allowFloat.
     *
     * @param mixed $allowFloat the allow float
     *
     * @return self
     */
    public function setAllowFloat($allowFloat)
    {
        $this->allowFloat = $allowFloat;

        return $this;
    }
}
