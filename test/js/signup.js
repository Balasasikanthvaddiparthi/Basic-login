$(document).ready(function(){
    var error1;
    $('form.signform').submit(function(e){
        e.preventDefault();
        var fn=$('#name').val();
        var em=$('#email').val();
        var un=$('#uid').val();
        var pwd=$('#pwd').val();
       
        $.ajax({
            type:"POST",
            url:"signup_inc.php",
            data:{
                submit: 1,
                name: fn,
                email: em,
                uid: un,
                pw: pwd
            },
            success:function(data){
                error1=data;
                $("#signn").load("errors.php",{error:error1.trim()});
           },
            datatype:'text'
       });
    })
});