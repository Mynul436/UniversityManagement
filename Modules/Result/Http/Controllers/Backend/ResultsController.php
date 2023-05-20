<?php

namespace Modules\Result\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Support\Facades\Crypt;
use Modules\Attendence\Events\AttendenceCreated;
use Modules\Attendence\Events\AttendenceUpdated;
use Modules\Attendence\Http\Requests\Backend\AttendencesRequest;
use Modules\Country\Http\Requests\Backend\CountriesRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Result\Events\ResultCreated;
use Modules\Result\Events\ResultUpdated;
use Modules\Result\Http\Requests\Backend\ResultsRequest;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ResultsController extends Controller
{
    use Authorizable;
    use Authorizable;

    use Authorizable;

    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;
    public $module_model;

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

    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');
        //dd($module_path);
        return view(
            //I used Static Here which is $module_path
            "result::backend.results.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $page_heading = label_case($module_title);
        $title = $page_heading.' '.label_case($module_action);

        $$module_name = $module_model::select('id', 'name', 'updated_at',
        'reg_no','total_marks','class_id','section_id','subject_id');

        $data = $$module_name;

        return Datatables::of($$module_name)
                        ->addColumn('action', function ($data) {
                            $module_name = $this->module_name;

                            return view('backend.includes.action_column', compact('module_name', 'data'));
                        })
                        ->editColumn('name', '<strong>{{$name}}</strong>')
                        ->editColumn('updated_at', function ($data) {
                            $module_name = $this->module_name;

                            $diff = Carbon::now()->diffInHours($data->updated_at);

                            if ($diff < 25) {
                                return $data->updated_at->diffForHumans();
                            } else {
                                return $data->updated_at->isoFormat('llll');
                            }
                        })
                        ->editColumn('reg_no','{{ $reg_no }}')
                        ->editColumn('total_marks','{{ $total_marks }}')
                        ->editColumn('class_id','{{ $class_id }}')
                        ->editColumn('section_id','{{ $section_id }}')
                        ->editColumn('subject_id','{{ $subject_id }}')
                        ->rawColumns(['name', 'action'])
                        ->orderColumns(['id'], '-:column $1')
                        ->make(true);
    }


    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';


        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "result::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular','module_path')
        );
    }

    public function store(ResultsRequest $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Store';
        $data = $request->all();
 // dd($data);
 
        $$module_name_singular = $module_model::create($data);


 
        event(new ResultCreated($$module_name_singular));

        Flash::success("<i class='fas fa-check'></i> New '".Str::singular($module_title)."' Added")->important();

        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return redirect("admin/$module_name");
    }

    public function show($id)
    {
       // $id =Crypt::encrypt($id);
       // dd($id);
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);

        $activities = Activity::where('subject_type', '=', $module_model)
                                ->where('log_name', '=', $module_name)
                                ->where('subject_id', '=', $id)
                                ->latest()
                                ->paginate();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "result::backend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular", 'activities','module_path')
        );
    }
    public function edit($id)
    {
    $module_title = $this->module_title;
    $module_name = $this->module_name;
    $module_path = $this->module_path;
    $module_icon = $this->module_icon;
    $module_model = $this->module_model;
    $module_name_singular = Str::singular($module_name);

    $module_action = 'Edit';

    $$module_name_singular = $module_model::findOrFail($id);

    Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

    return view(
        "result::backend.$module_name.edit",
        compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', 'module_action', "$module_name_singular",'module_path')
    );
}
public function update(ResultsRequest $request, $id)
{
    $module_title = $this->module_title;
    $module_name = $this->module_name;
    $module_path = $this->module_path;
    $module_icon = $this->module_icon;
    $module_model = $this->module_model;
    $module_name_singular = Str::singular($module_name);

    $module_action = 'Update';

    
    $data = $request->toArray();



    $$module_name_singular = $module_model::findOrFail($id);
    


    $$module_name_singular->update($data);

    

    event(new ResultUpdated($$module_name_singular));

    Flash::success("<i class='fas fa-check'></i> '".Str::singular($module_title)."' Updated Successfully")->important();

    Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

    return redirect("admin/$module_name");
}

public function destroy($id)
{
    $module_title = $this->module_title;
    $module_name = $this->module_name;
    $module_path = $this->module_path;
    $module_icon = $this->module_icon;
    $module_model = $this->module_model;
    $module_name_singular = Str::singular($module_name);

    $module_action = 'destroy';

    $$module_name_singular = $module_model::findOrFail($id);

    $$module_name_singular->delete();

    Flash::success('<i class="fas fa-check"></i> '.label_case($module_name_singular).' Deleted Successfully!')->important();

    Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

    return redirect("admin/$module_name");
}
public function trashed()
{
    $module_title = $this->module_title;
    $module_name = $this->module_name;
    $module_path = $this->module_path;
    $module_icon = $this->module_icon;
    $module_model = $this->module_model;
    $module_name_singular = Str::singular($module_name);

    $module_action = 'Trash List';

    $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

    Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name);

    return view(
        "result::backend.$module_name.trash",
        compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
    );
}


public function restore($id)
{
    $module_title = $this->module_title;
    $module_name = $this->module_name;
    $module_path = $this->module_path;
    $module_icon = $this->module_icon;
    $module_model = $this->module_model;
    $module_name_singular = Str::singular($module_name);

    $module_action = 'Restore';

    $$module_name_singular = $module_model::withTrashed()->find($id);
    $$module_name_singular->restore();

    Flash::success('<i class="fas fa-check"></i> '.label_case($module_name_singular).' Data Restoreded Successfully!')->important();

    Log::info(label_case($module_action)." '$module_name': '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

    return redirect("admin/$module_name");
}

}
