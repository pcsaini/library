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

$('document').ready(function()
{
    $("#add_book").validate({
        rules:
            {
                book_category_id: {
                    required : true
                },
                book_name:{
                    required : true
                },
                isbn:{
                    required : true
                },
                author:{
                    required : true
                },
                edition: {
                    required : true
                }
            },
        messages:
            {
                book_category_id: {
                    required : "Book Category is Required"
                },
                book_name:{
                    required : "Book Name is Required"
                },
                isbn:{
                    required : "ISBN No is Required",
                },
                author:{
                    required : "Author Name is Required"
                },
                edition: {
                    required : "Edition is Required"
                }

            }
    });

});

$('document').ready(function()
{
    $("#add_book_code").validate({
        rules:
            {
                book_category_id:{
                    required : true
                },
                isbn:{
                    required : true
                },
                book_code:{
                    required : true
                }
            },
        messages:
            {
                book_category_id:{
                    required : "Book Category is Required"
                },
                isbn:{
                    required : "ISBN No is Required"
                },
                book_code:{
                    required : "Book Code is Required"
                }
            }
    });

});

$('document').ready(function()
{
    //username validation
    var nameregex  = /^([a-zA-Z0-9 ])+([a-zA-Z0-9_\.\-\!\@\#\$\%\&\*\_])+$/;
    $.validator.addMethod("validname",function (value, element) {
        return this.optional(element) || nameregex.test(value);
    });
    //email validation
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $.validator.addMethod("validemail", function( value, element ) {
        return this.optional( element ) || eregex.test( value );
    });
    $("#add_student").validate({
        rules:
            {
                first_name:{
                    required : true
                },
                username:{
                    required : true,
                    validname : true,
                    minlength : 5,
                    remote:{
                        url: "add_student",
                        type: "post",
                        name: "username",
                        data: {
                            username: function() {
                                return $( "#username" ).val();
                            }
                        }
                    }
                },
                email:{
                    required : true,
                    validemail : true,
                    remote: {
                        url: "add_student",
                        type: "post",
                        name: "email",
                        data: {
                            email: function() {
                                return $( "#email" ).val();
                            }
                        }
                    }
                },
                gender:{
                    required : true
                },
                batch:{
                    required : true
                },
                stream:{
                    required : true
                },
                password:{
                    required : true,
                    minlength: 6,
                    maxlength: 15
                },
                password_again:{
                    required : true,
                    equalTo : '#password'
                }
            },
        messages:
            {
                first_name:{
                    required : "First Name is Required"
                },
                username:{
                    required : "Username is Required",
                    validname : "Please Enter Valid username",
                    minlength: "Password at least have 6 characters",
                    remote : "Username already exists"
                },
                email:{
                    required : "Email Address in required",
                    validemail: "Please Enter a valid Email address"
                },
                gender:{
                    required : "Gender is Required"
                },
                batch:{
                    required : "Batch is Required"
                },
                stream:{
                    required : "Stream is Required"
                },
                password:{
                    required: "Password is required",
                    minlength: "Password at least have 6 characters"
                },
                password_again:{
                    required: "Retype your password",
                    equalTo: "Password did not match !"
                }

            }
    });
});
