$(document).ready(function(){
    var error1;
    $('form.logform').submit(function(e){
        e.preventDefault();
        var un=$("#uid").val();
        var pw=$("#pwd").val();
        $.ajax({
            type:"POST",
            url:"login_inc.php",
            data:{
                submit:1,
                uid:un,
                pwd:pw
            },
            success: function(data){
                error1=data;
                $('#logg').load("errors.php",{error: error1.trim()});
            },
            datatype:'text'
        });
    })
});