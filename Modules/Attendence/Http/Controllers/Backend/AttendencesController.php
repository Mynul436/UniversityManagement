<?php

namespace Modules\Attendence\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Authorizable;
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
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AttendencesController extends Controller
{
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
            "attendence::backend.attendences.index_datatable",
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

        $$module_name = $module_model::select('id', 'name', 'updated_at','attendence_date',
        'section_name','class_name','subject_name','description','status');

        $data = $$module_name;

        return Datatables::of($$module_name)
                        ->addColumn('action', function ($data) {
                            $module_name = $this->module_name;

                            return view('backend.includes.action_column', compact('module_name', 'data'));
                        })
                        ->editColumn('name', '<strong>{{$name}}</strong>')
                        ->editColumn('attendence_date','{{ $attendence_date }}')
                        ->editColumn('section_name','{{ $section_name }}')
                        ->editColumn('class_name','{{ $class_name }}')
                        ->editColumn('subject_name','{{ $subject_name }}')
                        ->editColumn('status','{{ $status }}')
                        ->editColumn('updated_at', function ($data) {
                            $module_name = $this->module_name;

                            $diff = Carbon::now()->diffInHours($data->updated_at);

                            if ($diff < 25) {
                                return $data->updated_at->diffForHumans();
                            } else {
                                return $data->updated_at->isoFormat('llll');
                            }
                        })
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
            "attendence::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular','module_path')
        );
    }




    
     /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
    //  */
    // public function store(AttendencesRequest $request)
    // {
    //     $module_title = $this->module_title;
    //     $module_name = $this->module_name;
    //     $module_path = $this->module_path;
    //     $module_icon = $this->module_icon;
    //     $module_model = $this->module_model;
    //     $module_name_singular = Str::singular($module_name);
    
    //     $module_action = 'Store';
    //     $data = $request->except('_token');
    
    //     session()->get('section_date_classwise_attendence_req');
    
    //     $sessionData = session()->get('section_date_classwise_attendence_req');
    //     $mergedData = array_merge($sessionData, $data);
    
    //     $fixedValues = [
    //         'attendence_date' => $mergedData['attendence_date'],
    //         'section_name' => $mergedData['section_name'],
    //         'class_name' => $mergedData['class_name'],
    //         'subject_name' => $mergedData['subject_name'],
    //         'description' => $mergedData['description'],
    //     ];
    
    //     $attributes = [];
    //     foreach ($mergedData as $key => $value) {
    //         if (is_array($value)) {
    //             foreach ($value as $subKey => $subValue) {
    //                 $attributes["$key.$subKey"] = $subValue;
    //             }
    //         } else {
    //             $attributes[$key] = $value;
    //         }
    //     }
    
    //     $students = []; // Array to store student names
    
    //     foreach ($attributes as $studentId => $studentName) {
    //         // Assign each student name to the 'name' field using student ID as key
    //         $attributes["name.$studentId"] = $studentName;
    
    //         // Store student names in the $students array for logging purposes
    //         $students[] = $studentName;
    //     }
    //    // dd($attributes);
    
    //     unset($attributes['name']); // Remove the original 'name' field from $attributes
    
    //     $mergedAttributes = array_merge($fixedValues, $attributes);
    
    //     $$module_name_singular = $module_model::create($mergedAttributes);
    
    //     event(new AttendenceCreated($$module_name_singular));
    
    //     $studentNames = implode(', ', $students); // Convert student names to a string for logging
    
    //     Flash::success("<i class='fas fa-check'></i> New '".Str::singular($module_title)."' Added")->important();
    
    //     Log::info(label_case($module_title.' '.$module_action)." | '".$studentNames.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');
    
    //     return redirect("admin/$module_name");
    // }
    
//      public function store(AttendencesRequest $request)
// {
//     $module_title = $this->module_title;
//     $module_name = $this->module_name;
//     $module_path = $this->module_path;
//     $module_icon = $this->module_icon;
//     $module_model = $this->module_model;
//     $module_name_singular = Str::singular($module_name);

//     $module_action = 'Store';
//     $data = $request->except('_token');

//     session()->get('section_date_classwise_attendence_req');

//     $sessionData = session()->get('section_date_classwise_attendence_req');
//     $mergedData = array_merge($sessionData, $data);

//     $attributes = [];
//     foreach ($mergedData as $key => $value) {
//         if (is_array($value)) {
//             foreach ($value as $subKey => $subValue) {
//                 $attributes["$key.$subKey"] = $subValue;
//             }
//         } else {
//             $attributes[$key] = $value;
//         }
//     }
//  //   dd($attributes);

//     $$module_name_singular = $module_model::create($attributes);

//     event(new AttendenceCreated($$module_name_singular));

//     Flash::success("<i class='fas fa-check'></i> New '".Str::singular($module_title)."' Added")->important();

//     Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

//     return redirect("admin/$module_name");
// }
public function store(AttendencesRequest $request)
{
    $module_title = $this->module_title;
    $module_name = $this->module_name;
    $module_path = $this->module_path;
    $module_icon = $this->module_icon;
    $module_model = $this->module_model;
    $module_name_singular = Str::singular($module_name);

    $module_action = 'Store';

    $data = $request->except('_token');
    $sessionData = session()->get('section_date_classwise_attendence_req');
    $mergedData = array_merge($sessionData, $data);

    $mergedData = array_merge($sessionData, $data);
    
        $fixedValues = [
            'attendence_date' => $mergedData['attendence_date'],
            'section_name' => $mergedData['section_name'],
            'class_name' => $mergedData['class_name'],
            'subject_name' => $mergedData['subject_name'],
            'description' => $mergedData['description'],
        ];
      //  dd($fixedValues);

    // Extract the required fields and their corresponding values
    $requiredFields = ['attendence_date', 'section_name', 'class_name', 'subject_name', 'description'];
    $extractedData = array_intersect_key($mergedData, array_flip($requiredFields));
// dd($extractedData);
    // Extract the student data and restructure it
    $students = [];
    foreach ($mergedData['name'] as $studentId => $studentName) {
        $students[] = [
            'name' => $studentName,
            'status' => $mergedData['status'][$studentId],
            'comment' => $mergedData['comment'][$studentId],
        ];
    }

    // Add the student data to the extracted data
    $extractedData['students'] = $students;
  //  dd($extractedData['students']);
    $countArray=count($extractedData['students']);
  //  dd($countArray);
   $studentAttendanceInfo=[];
   // dd($extractedData['students'][0]);
    for($i=0;$i<$countArray;$i++){
        $studentAttendanceInfo[$i]=$extractedData['students'][$i];
        //dd($studentAttendanceInfo[$i]);
        $mergedData = array_merge($fixedValues, $studentAttendanceInfo[$i]);
     //   dd($mergedData);
        $$module_name_singular = $module_model::create($mergedData);

       
    }
    

    // Create the record using the extracted data

    event(new AttendenceCreated($$module_name_singular));

    Flash::success("<i class='fas fa-check'></i> New '".Str::singular($module_title)."' Added")->important();

    Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

    return redirect("admin/$module_name");
}

   
    public function section_date_classwise_attendence(AttendencesRequest $request){
        // dd($request->all());
        // dd('section_date_classwise_attendence');

        session()->put('section_date_classwise_attendence_req', $request->all());
        // dd(session()->get('section_date_classwise_attendence_req'));

        $attendence_date = $request->attendence_date;
        $section_name = $request->section_name;
        $class_name= $request->class_name;
        $subject_name= $request->subject_name;

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';
        


        // $$module_name = $module_model::role('student')
        // ->where('section_name', $section_name)
        // ->where('class_name', $class_name)
        // ->select('name');


        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "attendence::backend.$module_name.section_date_classwise_attendence",
            compact('module_title', 'module_name', 'module_icon','attendence_date', 
            'section_name','class_name','subject_name',
            'module_action', 'module_name_singular','module_path')
        );
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
            "attendence::backend.$module_name.show",
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
        "attendence::backend.$module_name.edit",
        compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', 'module_action', "$module_name_singular",'module_path')
    );
}

        public function update(AttendencesRequest $request, $id)
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

        

        event(new AttendenceUpdated($$module_name_singular));

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
            "attendence::backend.$module_name.trash",
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



