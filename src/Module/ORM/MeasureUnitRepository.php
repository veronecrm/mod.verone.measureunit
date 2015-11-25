<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\MeasureUnit\ORM;

use CRM\ORM\Repository;

class MeasureUnitRepository extends Repository
{
    public $dbTable = '#__measure_unit';

    public function getFieldsNames()
    {
        return [
            'unit' => $this->t('measureUnitName'),
            'name' => $this->t('measureUnitUnit'),
            'allowFloat' => $this->t('measureUnitAllowFloat')
        ];
    }
}
