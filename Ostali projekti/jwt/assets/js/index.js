$(document).ready(function(){
    // Regularni izrazi za registraciju
    $("#dugme").click(function(){
        let arrayError = [];

        let name = $("#name").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let username = $("#username").val();

        let regexname= /^[A-Z]{1}[a-z]{2,20}$/;
        let regexusername = /^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/;
        let regexemail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        let regexpass = /([\w\W\D\d]){3,}/;

        if(!regexname.test(name) || name == ""){
            arrayError.push("There is something wrong with your name!");
        }
    
        if(!regexusername.test(username) || username == ""){
            arrayError.push("There is something wrong with your username!");
        }
    
        if(!regexemail.test(email) || email == ""){
            arrayError.push("You need to use ict@edu.rs email!");
        }
    
        if(!regexpass.test(password) || password == ""){
            arrayError.push("Your password has to be minimum 7 characters long!");
        }

        $(".alert").hide();

        if(arrayError.length > 0){
            $(".alert").show();
            let html = "";
            for(let i = 0; i < arrayError.length; i++) {
                html += "<li>" + arrayError[i] + "</li>";
            }
            $(".alert").html(html);
            return false;
        }else{
            return true;
        }

    });

    // Regularni izrazi za logovanje
    $("#dugmelog").click(function(){
        let arrayError = [];

        let password = $("#password").val();
        let username = $("#username").val();

        let regexusername = /^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/;
        let regexpass = /([\w\W\D\d]){3,}/;

        if(!regexusername.test(username) || username == ""){
            arrayError.push("There is something wrong with your username!");
        }
    
        if(!regexpass.test(password) || password == ""){
            arrayError.push("Your password has to be minimum 7 characters long!");
        }

        $(".alert").hide();

        if(arrayError.length > 0){
            $(".alert").show();
            let html = "";
            for(let i = 0; i < arrayError.length; i++) {
                html += "<li>" + arrayError[i] + "</li>";
            }
            $(".alert").html(html);
            return false;
        }else{
            return true;
        }

    });
})