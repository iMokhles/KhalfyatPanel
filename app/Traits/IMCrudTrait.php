<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 24/10/2018
 * Time: 16:39
 */

namespace App\Traits;

use App\Helpers\IMCrudHelper;

trait IMCrudTrait
{

    public function getActiveFunction() {
        return IMCrudHelper::getSettingsCheckboxColumn($this->active);
    }
    public function getRevokedFunction() {
        return IMCrudHelper::getSettingsCheckboxColumn($this->revoked);
    }
}