<?php

namespace Modules\Notice\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class NoticesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Notices';

        // module name
        $this->module_name = 'notices';

        // directory path of the module
        $this->module_path = 'notice::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Notice\Models\Notice";
    }

}
