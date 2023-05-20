<div class="row mb-3">
    <div class="col-12 col-sm-4">
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
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'reg_no';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'class_id';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $classes=DB::table('standardorclasses')->get(['id','name']);
         //   dd($classes);

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
            $field_name = 'section_id';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $classes=DB::table('sections')->get(['id','name']);
// dd($classes);

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
            $field_name = 'subject_id';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            $classes=DB::table('subjects')->get(['id','name']);
// dd($classes);

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
            $field_name = 'total_marks';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4">
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
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $required = "required";
            $select_options = [
                '1'=>'Pass',
                '0'=>'Fail',
                '2'=>'Absent'
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
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

