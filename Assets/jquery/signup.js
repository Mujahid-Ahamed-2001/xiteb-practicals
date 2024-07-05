$(document).ready(function(){
    $("#email").keyup(function(){
        var email = $(this).val();
        $.ajax({
            url:'../handlers/signup-handler.php',
                method:'post',
                data:{email:email},
                success:function(response)
                {
                    if(response==1)
                    {
                        $("#validate").fadeOut();
                        $("#btn").attr("disabled",false);
                    }
                    else
                    {
                        $("#validate").fadeIn();
                        $("#btn").attr("disabled",true);
                    }
                    
                    
                }
        })
    });
})