<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\MeasureUnit\Plugin;

use CRM\App\Module\Plugin;

class Links extends Plugin
{
    public function dashboard()
    {
        if($this->acl('mod.MeasureUnit.MeasureUnit', 'mod.MeasureUnit')->isAllowed('core.module'))
        {
            return [
                [
                    'ordering' => 10,
                    'icon' => 'fa fa-tachometer',
                    'icon-type' => 'class',
                    'name' => $this->t('measureUnits'),
                    'href' => $this->createUrl('MeasureUnit', 'MeasureUnit')
                ]
            ];
        }
    }
}
