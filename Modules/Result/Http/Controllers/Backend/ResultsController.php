<?php

namespace Modules\Result\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class ResultsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Results';

        // module name
        $this->module_name = 'results';

        // directory path of the module
        $this->module_path = 'result::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Result\Models\Result";
    }

}
