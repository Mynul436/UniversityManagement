<?php

namespace Modules\ClassSection\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class ClassSectionsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'ClassSections';

        // module name
        $this->module_name = 'classsections';

        // directory path of the module
        $this->module_path = 'classsection::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\ClassSection\Models\ClassSection";
    }

}
