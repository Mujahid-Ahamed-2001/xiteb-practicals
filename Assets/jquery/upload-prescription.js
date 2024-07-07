$(document).ready(function() {
    grandtotal();
    $("#drug").select2();
    $("#drug").on('change', function(){
        var drugid=$(this).val();
        if(drugid=="")
        {
            $("#price").val(0)
        }
        else
        {
        $.ajax({
                    url:'../handlers/drug-handler.php',
                        method:'post',
                        data:{drugid:drugid},
                        success:function(response)
                        {
                            $("#price").val(response);                 
                            
                        }
                });
        }
        
    });
    function grandtotal()
    {
        var tot=0;
        $("body #amount").each(function(){
            tot += parseFloat($(this).val());
        })
        var tot2=tot.toFixed(2);
        $("#total").val(tot2);
        $("#totalval").text(tot2);

    }
    $("#add").click(function(){
        var drug=$("#drug").val();
        var price=$("#price").val();
        var qty=$("#qty").val();
        if(price==0 || qty == 0 || price=="" || qty=="")
        {
            alert("Please fill the required filds");
        }
        else if($("#tr"+drug).length!=0)
        {
            alert("Drug Already Available");
        }
        else
        {
            $.ajax({
                url:'../handlers/drug-handler.php',
                method:'post',
                data:{
                    drug:drug,
                    price:price,
                    qty:qty
                },
                success:function(response)
                {
                    $("#tbody").append(response);
                    grandtotal();
                    $("#qty").val("");
                    $("#drug").val("");
                }
            });
        }
    })
    $('#prescription').on('change', function() {
        var files = $(this)[0].files;
        var preview = $('#preview');
        preview.empty(); // Clear any existing previews

        if (files.length > 5) {
            alert("You can only upload a maximum of 5 files.");
            $(this).val(''); // Clear the input field
            return;
        }

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            // Check if the file is an image
            if (file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img style="height:100px; width:100px; margin:10px;border-radius: 10px;">').attr('src', e.target.result);
                    preview.append(img);
                }
                reader.readAsDataURL(file);
            } else {
                alert("Only image files are allowed.");
                $(this).val(''); // Clear the input field
                preview.empty(); // Clear any previews if the selection is invalid
                return;
            }
        }
    });
});