var form = document.querySelector("form");
// Affiche de toutes les données saisies ou choisies
function validateForm(){
    var name = form.elements.name.value;
    var firstName = form.elements.firstName.value;
    var phone = form.elements.phone.value;
    var city = form.elements.city.value;
    var main = form.elements.main.value;
    var woman = form.elements.woman.value;
    var email = form.elements.email.value;
    var confirmEmail = form.elements.confirmEmail.value;
    var password = form.elements.password.value;

    if(name == "") {
    document.getElementById('nameError').innerHTML ="Please enter a valid name";
    } else {
      var regex = /^[a-zA-Z ]{2,30}$/;
      if(regex.test(name) === false) {
      document.getElementById('nameError').innerHTML ="Please enter a valid name";
       nameError = false;
       }
      else {
            nameError = true;
      }
    }
    if(firstName == "") {
    document.getElementById('firstNameError').innerHTML ="Please enter a valid name";
    } else {
      var regex = /^[a-zA-Z ]{2,30}$/;
      if(regex.test(firstName) === false) {
      document.getElementById('firstNameError').innerHTML ="Please enter a valid name"
      firstNameError =false;
      }
      else {
          firstNameError =true;
          }
    }
    if(city == "") {
    document.getElementById('cityError').innerHTML ="incorrect city";
    } else {
      var regex = /([a-z|0-9])/gi;
      if(regex.test(city) === false) {
      document.getElementById('cityError').innerHTML ="incorrect city";
      cityError= false;
      }
      else {
           cityError= true;
      }
    }
      if(phone == "") {
      document.getElementById('numloc').innerHTML ="Please enter your mobile";
      } else {
        var regex = /\d/;
        if(regex.test(phone) === false) {
        document.getElementById('numloc').innerHTML ="Please enter a valid  mobile number";
        numloc=false;
        }
        else {
             numloc=true;
        }
    }
    if(email == "") {
         document.getElementById('emailErremailErr').innerHTML ="Please enter your email address";
   } else {
       var regex = /^\S+@\S+\.\S+$/;
       if(regex.test(email) === false) {
           document.getElementById('emailErr').innerHTML= "Please enter your email address";
           emailErr=false;

       } else{
          emailErr=true;
       }
   }
   if(password == "") {
        document.getElementById('pwdError').innerHTML ="Please enter a valid password";
   } else {
      var regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{4,15})$/;
      if(regex.test(password) === false) {
        document.getElementById('pwdError').innerHTML ="Please enter a valid password";
       pwdError=false;
      } else{
          pwdError=true;
      }
   }
   if(email != confirmEmail) {
     alert('Email Not Matching!');
   }
   else {
     confirmEmail=true;
   }
   if((nameError & firstNameError &  numloc & emailErr & pwdError  & cityError) == true)
   {
     return true;
   }
   else {
     return false;
   }

    e.preventDefault(); // Annulation de l'envoi des données

}

$(document).ready(function(){
          //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var form_data = $(this).serialize()+ "name:jilali";

            $("#submit").click(function(){
                $.ajax({
                  headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                     /* the route pointing to the post function */
                    url: '/users/new',
                    type: 'POST',
                    /*  that 'data' is the response of the AjaxController */
                    data: form_data,
                    dataType: 'JSON',
                    contentType: "application/json; charset=utf-8",
                    success: function (response) {
                      alert("the user is adding successfully !!");
                    },
                    error: (error) => {
                      console.log('there is an error');
                    }
                });

            });
       });

$(document).ready(function(){

       $("#submit").click(function(){

     $.ajax({
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
             url: '/users',
             type: 'GET',
             data: {},
             dataType: 'JSON',
             success: function (response) {
               alert ("your users are already in the table  !!");
                 console.dir(response[0]);
                 var trHTML='';
         $.each(response, function (i, o){
              trHTML += '<dl><dt>' + "Name" +
               '</dt><dd>' + o.first_name +
               '</dd></dl>'+'<dl><dt>' + "Téléphone" +
                '</dt><dd>' + o.phone +
                '</dd></dl>'+ '<dl><dt>' + "Email" +
                 '</dt><dd>' + o.email +
                 '</dd></dl>'+ '<dl><dt>' + "Ville" +
                  '</dt><dd>' + o.city +
                  '</dd></dl>';
                });
                   $('#info').append(trHTML);
                       },
                error: function (e) {
                console.log("error");
               },
         });
       });
   });
