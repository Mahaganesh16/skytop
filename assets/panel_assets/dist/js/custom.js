$(document).ready(function(){      
    var i=1;  

    $('#add').click(function(){  
         i++;  
         $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter Credential Name" class="form-control name_list" /></td><td><input type="text" name="value[]" placeholder="Enter credential value" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    });

    $(document).on('click', '.btn_remove', function(){  
         var button_id = $(this).attr("id");   
         $('#row'+button_id+'').remove();  
    });  

});

        