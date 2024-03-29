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
<div class="col-12 col-sm-4">
    <div class="form-group">
        <?php
            $field_name = 'attendence_date';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
        {{ html()->date($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
    </div>
</div>


<div class="col-12 col-sm-4">
    <div class="form-group">
        <?php
            $field_name = 'section_name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $sections=DB::table('sections')->get(['id','name']);
 //dd($sections);

            ?>
        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
        {{-- {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }} --}}
        <select name="{{$field_name}}" id="{{$field_name}}" class="form-control" required="required">
            @foreach ($sections as $section)
            <option value="{{$section->name}}">{{$section->name}}</option>
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

            ?>
        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
        {{-- {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }} --}}
        <select name="{{$field_name}}" id="{{$field_name}}" class="form-control" required="required">
            @foreach ($classes as $class)
            <option value="{{$class->name}}">{{$class->name}}</option>
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
            <option value="{{$subject->name}}">{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>


{{--
    @php
        $selectedClass = request()->input('class_name');
        $students = $studentsByClass[$selectedClass] ?? collect();
    @endphp
    <h3>{{ $selectedClass }}</h3>
<table id="example" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Attend Status</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>
                <select name="attendance_status[{{ $student->id }}]">
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="leave">Leave</option>
                </select>
            </td>
            <td>
                <input type="text" name="attendance_comment[{{ $student->id }}]">
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}



