<?php

namespace Modules\Subject\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class SubjectsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Subjects';

        // module name
        $this->module_name = 'subjects';

        // directory path of the module
        $this->module_path = 'subject::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Subject\Models\Subject";
    }

}
