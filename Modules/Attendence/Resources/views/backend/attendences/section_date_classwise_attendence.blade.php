@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}'>
        {{ __($module_title) }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
                <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary ms-1" data-toggle="tooltip" title="{{ __($module_title) }} List"><i class="fas fa-list-ul"></i> List</a>
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col">
                {{ html()->form('POST', route("backend.$module_name.store"))->acceptsFiles()->class('form')->open() }}

                <div class="card-body">
                    @php
                
                    use App\Models\User;
                    use Spatie\Permission\Models\Role;
                
                    $student = Role::findByName('student');
                    $student1 = $student->users
                    ->where('section_name', $section_name)
                    ->where('class_name', $class_name);
                 //   dd($student1);
                    $studentsByClass = $student1->groupBy('class');
                
                    @endphp
                    @foreach($studentsByClass as $class => $students)
                    <h3>{{ $class }}</h3>

                    <table id="example" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Attendance Status</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        $field_name = 'name['.$student->id.']';


                                        $field_label = label_case($field_name);
                                        $field_placeholder = $field_label;
                                        $required = "";
                                        ?>
                                        {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                        {{ html()->textarea($field_name)->placeholder($field_placeholder)
                                        ->class('form-control')->value($student->name)
                                        ->attributes(["$required",'readonly'=>'readonly']) }}                                    
                                    </div>
                                </td>                              
                
                                <td>
                                    @php
                                    // dd($student->id)
                                    @endphp
                                    <div class="form-group">
                                        <?php
                                            $field_name = 'status['.$student->id.']';
                                            $field_lable = label_case($field_name);
                                            $field_placeholder = "-- Select an option --";
                                            $required = "required";
                                            $select_options = [
                                                '1'=>'Present',
                                                '0'=>'Absent',
                                                '2'=>'Leave'
                                            ];
                                            ?>
                                        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        $field_name = 'comment['.$student->id.']';
                                        $field_lable = label_case($field_name);
                                        $field_placeholder = $field_lable;
                                        $required = "";
                                        ?>
                                        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @endforeach

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
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{ html()->button($text = "<i class='fas fa-plus-circle'></i> " . ucfirst($module_action) . "", $type = 'submit')->class('btn btn-success') }}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="float-end">
                            <div class="form-group">
                                <x-buttons.cancel></x-buttons.cancel>
                            </div>
                        </div>
                    </div>
                </div>

                {{ html()->form()->close() }}

            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">

            </div>
        </div>
    </div>
</div>




@endsection