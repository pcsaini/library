/**
 * Created by pcsaini on 20/12/16.
 */


$('document').ready(function()
{
    $("#login-form").validate({
        rules:
            {
                password: {
                    required: true
                },
                username: {
                    required: true
                }
            },
        messages:
            {
                password:{
                    required: "please enter your password"
                },
                username: {
                    required: "please enter your username"
                }
            },
    });

});


$('document').ready(function()
{
    $("#change-password").validate({
        rules:
            {
                current_password: {
                    required : true
                },
                new_password:{
                    required : true,
                    minlength: 6,
                    maxlength: 15
                },
                new_password_again:{
                    required : true,
                    equalTo : '#new_password'
                }
            },
        messages:
            {
                current_password:{
                    required: "Password is required",
                },
                new_password:{
                    required: "Password is required",
                    minlength: "Password at least have 6 characters"

                },
                new_password_again:{
                    required: "Retype your password",
                    equalTo: "Password did not match !"
                }
            }
    });

});

$('document').ready(function()
{

    //email validation
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $.validator.addMethod("validemail", function( value, element ) {
        return this.optional( element ) || eregex.test( value );
    });
    $("#forget_password").validate({
        rules:
            {
                email:{
                    required : true,
                    validemail : true
                }
            },
            message:{
                email:{
                    required : "Email Address in required",
                    validemail: "Please Enter a valid Email address"
                }
            }
    })
});

$('document').ready(function()
{
    $("#reset-password").validate({
        rules:
            {
                new_password:{
                    required : true,
                    minlength: 6,
                    maxlength: 15
                },
                new_password_again:{
                    required : true,
                    equalTo : '#new_password'
                }
            },
        messages:
            {
                new_password:{
                    required: "Password is required",
                    minlength: "Password at least have 6 characters"

                },
                new_password_again:{
                    required: "Retype your password",
                    equalTo: "Password did not match !"
                }
            }
    });

});
