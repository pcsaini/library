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