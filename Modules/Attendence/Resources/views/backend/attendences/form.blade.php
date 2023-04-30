<div class="row mb-3">
    {{-- <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div> --}}
    {{-- <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div> --}}

    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'section_name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $sections=DB::table('sections')->get(['id','name']);
// dd($classes);

            ?>
               {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{-- {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }} --}}
            <select name="{{$field_name}}" id="{{$field_name}}" class="form-control" required="required">
                @foreach ($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'class_name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $classes=DB::table('standardorclasses')->get(['id','name']);
// dd($classes);

            ?>
               {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{-- {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }} --}}
            <select name="{{$field_name}}" id="{{$field_name}}" class="form-control" required="required">
                @foreach ($classes as $class)
                    <option value="{{$class->id}}">{{$class->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'subject_name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $subjects=DB::table('subjects')->get(['id','name']);
// dd($classes);

            ?>
               {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{-- {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }} --}}
            <select name="{{$field_name}}" id="{{$field_name}}" class="form-control" required="required">
                @foreach ($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="card-body">
    <table id="example" class="table table-bordered table-striped">
@php
// $students=DB::table('users')->whereHas('roles', function($q){
//     $q->where('name', 'student');
// })->get();   
// dd($students);  
 use App\Models\User;
    // use App\Models\Role;
    use Spatie\Permission\Models\Role;
// dd(User::whereHas("roles", function($q){ $q->where("name", "roo"); })->get());
// $student=User::whereHas("roles", function($q){ $q->where("name", "stuendt"); })->get();
$student = Role::findByName('student');
 $student1 = $student->users;
// $student = Role::where('name', 'student')->first()->getUsersWithRole();
dd($student1);
@endphp

        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Attend Status</th>
                <th>Comment</th>

            </tr>
        </thead>
        <tbody>


      
        </tbody>
    </table>
</div>


<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>


