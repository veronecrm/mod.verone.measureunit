<?php
/**
 * Verone CRM | http://www.veronecrm.com
 *
 * @copyright  Copyright (C) 2015 Adam Banaszkiewicz
 * @license    GNU General Public License version 3; see license.txt
 */

namespace App\Module\MeasureUnit\Controller;

use CRM\App\Controller\BaseController;
use CRM\Pagination\Paginator;

/**
 * @section mod.MeasureUnit.MeasureUnit
 */
class MeasureUnit extends BaseController
{
    /**
     * @access core.module
     */
    public function indexAction($request)
    {
        return $this->render('', [
            'elements' => $this->repo()->findAll()
        ]);
    }

    /**
     * @access core.write
     */
    public function addAction()
    {
        return $this->render('form', [
            'unit' => $this->entity()
        ]);
    }

    /**
     * @access core.write
     */
    public function saveAction($request)
    {
        $unit = $this->entity()->fillFromRequest($request);

        $this->repo()->save($unit);

        $this->openUserHistory($unit)->flush('create', $this->t('measureUnit'));

        $this->flash('success', $this->t('measureUnitSaved'));

        if($request->get('apply'))
            return $this->redirect('MeasureUnit', 'MeasureUnit', 'edit', [ 'id' => $unit->getId() ]);
        else
            return $this->redirect('MeasureUnit', 'MeasureUnit', 'index');
    }


    /**
     * @access core.read
     */
    public function editAction($request)
    {
        $unit = $this->repo()->find($request->get('id'));

        if(! $unit)
        {
            $this->flash('danger', $this->t('measureUnitDoesntExists'));
            return $this->redirect('MeasureUnit', 'MeasureUnit', 'index');
        }

        return $this->render('form', [
            'unit' => $unit
        ]);
    }

    /**
     * @access core.write
     */
    public function updateAction($request)
    {
        $unit = $this->repo()->find($request->get('id'));

        if(! $unit)
        {
            $this->flash('danger', $this->t('measureUnitDoesntExists'));
            return $this->redirect('MeasureUnit', 'MeasureUnit', 'index');
        }

        $log = $this->openUserHistory($unit);

        $unit->fillFromRequest($request);

        $this->repo()->save($unit);

        $log->flush('change', $this->t('measureUnit'));

        $this->flash('success', $this->t('measureUnitUpdated'));

        if($request->get('apply'))
            return $this->redirect('MeasureUnit', 'MeasureUnit', 'edit', [ 'id' => $unit->getId() ]);
        else
            return $this->redirect('MeasureUnit', 'MeasureUnit', 'index');
    }

    /**
     * @access core.delete
     */
    public function deleteAction($request)
    {
        $unit = $this->repo()->find($request->get('id'));

        if(! $unit)
        {
            $this->flash('danger', $this->t('measureUnitDoesntExists'));
            return $this->redirect('MeasureUnit', 'MeasureUnit', 'index');
        }

        $this->repo()->delete($unit);

        $this->openUserHistory($unit)->flush('delete', $this->t('measureUnit'));

        $this->flash('success', $this->t('measureUnitDeleted'));

        return $this->redirect('MeasureUnit', 'MeasureUnit', 'index');
    }
}
