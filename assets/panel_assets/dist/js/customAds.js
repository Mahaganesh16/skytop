 $(function () {
            $('.select2').select2({
              theme: 'bootstrap4'
            });
          });
        
        function subCat() {
           var sub_category = $('#subCategory').val();
           if(sub_category==0){
                $("#title").hide();
                $("#Copon").hide();
                $("#State").hide();
                $("#City").hide();
                $("#Zip_Code").hide();
                $("#disc").hide();

            }else{
                $("#title").show();
                $("#Copon").show();
                $("#State").show();
                $("#City").show();
                $("#Zip_Code").show();
                $("#disc").show();
            }
        }
        $(function() {
            $('input:checkbox').change(function() {
            if($(this).is(':checked')){  
           
                $("#cname").show();
                $("#cpercentage").show();       
                $("#code").show();
            }else{
                $("#cname").hide();
                $("#cpercentage").hide(); 
                $("#code").hide();
            }
            
          });
        });
        function Zip_code() {
            $("#demo1").show();
          var x = document.getElementById("zip").value;
          document.getElementById("map").src = "https://maps.google.com/maps?q="+ x +"&output=embed";
        }
        
     
     $(function() {
        $('#logo').change(function() {
            $(".logo1").show();
            $("#Title_name").show();
      });
    });
     $(function() {
        $('#Code').change(function() {
        $(".Coupon").show();
        });
    });
     $(function() {
        $('#Desc').change(function() {
            $(".Description").hide();
        $(".Desc").show();
        });
    });
       
 