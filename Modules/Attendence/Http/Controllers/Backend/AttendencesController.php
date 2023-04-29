<?php

namespace Modules\Attendence\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class AttendencesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Attendences';

        // module name
        $this->module_name = 'attendences';

        // directory path of the module
        $this->module_path = 'attendence::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Attendence\Models\Attendence";
    }

}
