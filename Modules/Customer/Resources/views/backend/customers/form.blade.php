<style>
    .referrer-phone-group {}

    .referrer-phone-group input#referrer_mobile_number {
        width: 80%;
        display: inline-block;
        position: relative;
    }

    span.find-r-info {
        background-color: #000000;
        position: relative;
        display: inline-block;
        padding: 5px 12px;
        border-radius: 4px;
        border: 1px solid #000;
        cursor: pointer;
        color: #fff;
    }
</style>



<div class="row mb-3">
    <div class="col-12 col-sm-4">
        <div class="form-group referrer-phone-group">
            <?php
            $field_name = 'referrer_mobile_number';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $mobile_number=DB::table('datauploads')->get('mobile_number');
        //    dd($mobile_number)
        
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{-- {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control referrer_phone_no')->attributes(["$required","pattern" => "[0-9]{11}", "title" => "Please enter a valid 11-digit mobile number"]) }} --}}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control referrer_phone_no')->attributes(["$required"]) }}

            <span class="find-r-info btn-get-data" id="get-referrer-data" data-id="1">
                Find
            </span>
 
            
            


        </div>
    </div>

    <div class="col-12 col-sm-4" style="display: none;">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{-- {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }} --}}
            <input class="form-control" type="text" name="slug" id="slug" placeholder="Slug" value="N/A">
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{-- {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!} --}}
            <label class="form-label" for="name">Referrer Name</label>
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control referrer-name-inherit')->attributes(["$required","readonly" => "readonly"]) }}
        </div>
    </div> 
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'referrer_pos_id';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control referrer-pos-id-inherit')->attributes(["$required","readonly" => "readonly"]) }}
        </div>
    </div>
    <script type="module"> 
        $("#get-referrer-data").click(function() {
             // var id = $(this).data("id");
             
             var id = $('.referrer_phone_no').val();

             
             // Send Ajax request to get the row data of the specified id
             $.ajax({
                 url: "/datauploads/" + id,
                 type: "GET",
                 dataType: "json",
                 success: function(response) {
                     // Display the name of the row data in the console
                     console.log(response); 
                     
                     if(response != "null"){
                        $('.referrer-name-inherit').val(response.name);
                        $('.referrer-pos-id-inherit').val(response.pos_id);
                     }else {
                        alert('Sorry this number is not our Referrer Number.');
                     }
                     
                 },
                 error: function(xhr) {
                    console.log(xhr.responseText);
                 }
             });
         });


     </script> 
    <div class="col-12 col-sm-4">
        
        @if($module_action != "Edit")
            <div class="form-group">
                <?php
                $field_name = 'referee_pos_id';
                $field_lable = label_case($field_name);
                $field_placeholder = $field_lable;
                $required = "required";
                ?>
                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", "id" => "referee_pos_id","readonly" => "readonly" ]) }}
            </div>
        @else
            <div class="form-group">
                <?php
                    $field_name = 'referee_pos_id';
                    $field_lable = label_case($field_name);
                    $field_placeholder = $field_lable;
                    $required = "required";
                ?>
                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", "id" => "referee_pos_id_edit","readonly" => "readonly" ]) }}
            </div>
        @endif
        
        <script>
            // Call the generateReferrerPosId() function and fill the field with the generated Referrer POS ID
            document.addEventListener("DOMContentLoaded", function() {
                var referrerPosIdField = document.getElementById("referee_pos_id");
                if (referrerPosIdField) {
                    var referrerPosId = generateReferrerPosId();
                    referrerPosIdField.value = referrerPosId;
                }
            });
            
            function generateReferrerPosId() { 
                var date = new Date();
                var year = date.getFullYear();
                var month = (date.getMonth() + 1).toString().padStart(2, '0');
                var day = date.getDate().toString().padStart(2, '0');
                var dateStr = year + month + day; 
                // Get the number of referrers on the same day
                var count = <?php echo DB::table('customers')->whereDate('created_at', '=', date('Y-m-d'))->count(); ?> +1; 
                // Increment the count by 1 and format it with leading zeros 
                var countStr = count.toString().padStart(4, '0'); 
                // Concatenate the parts into the Referrer POS ID
                var referrerPosId = "CUS-" + dateStr + "-" + countStr; 
                count++; 
                return referrerPosId;
            }
        </script>
        
        
        
    </div>
     <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'referee_mobile_number';
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
            $field_name = 'referee_name';
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
            $field_name = 'relationship_with_referrer';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
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


 

