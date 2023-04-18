<?php

namespace Modules\Section\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class SectionsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Sections';

        // module name
        $this->module_name = 'sections';

        // directory path of the module
        $this->module_path = 'section::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Section\Models\Section";
    }

}
