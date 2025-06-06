<?php

/**
 * Implementation of ButtonIF for encounter module
 *
 * Copyright (C) 2013 OEMR 501c3 www.oemr.org
 *
 * LICENSE: This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://opensource.org/licenses/gpl-license.php>;.
 *
 * @package OpenEMR
 * @author  Ken Chapple <ken@mi-squared.com>
 * @author  Medical Information Integration, LLC
 * @link    http://www.open-emr.org
 **/

namespace ESign;

require_once $GLOBALS['srcdir'] . '/ESign/ButtonIF.php';
require_once $GLOBALS['srcdir'] . '/ESign/ViewableIF.php';

class Encounter_Button implements ButtonIF
{
    private $_viewer = null;

    public function __construct($encounterId)
    {
        $this->_viewer = new Viewer();
        $this->_viewer->target = "_parent";
        $this->_viewer->encounterId = $encounterId;
    }

    public function isViewable()
    {
        return $GLOBALS['esign_all'];
    }

    public function getViewScript()
    {
        return $GLOBALS['srcdir'] . '/ESign/views/encounter/esign_button.php';
    }

    public function render(?SignableIF $signable = null)
    {
        return $this->_viewer->render($this);
    }

    public function getHtml(?SignableIF $signable = null)
    {
        return $this->_viewer->getHtml($this);
    }
}
