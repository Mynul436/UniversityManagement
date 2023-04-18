<?php

namespace Modules\StandardOrClass\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class StandardOrClassesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'StandardOrClasses';

        // module name
        $this->module_name = 'standardorclasses';

        // directory path of the module
        $this->module_path = 'standardorclass::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\StandardOrClass\Models\StandardOrClass";
    }

}
