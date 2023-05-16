function validateLogin(){
    var form = document.forms["Login"];

    let x = document.forms["Login"]["userName"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }

    if(form["userName"].value.length < 2){
        alert("Sectiunea 'Username' trebuie sa aiba minim 2 caractere");
        form.userName.focus();
        form.userName.value = "";
        return false;
    }
    if(form["userName"].value.length > 15){
        alert("Sectiunea 'Username' trebuie sa aiba maxim 15 caractere");
        form.userName.focus();
        form.userName.value = "";
        return false;
    }

    
    if(form["userPassword"].value.length < 2){
        alert("Sectiunea 'Password' trebuie sa aiba minim 2 caractere");
        form.userPassword.focus();
        form.userPassword.value = "";
        return false;
    }
    if(form["userPassword"].value.length > 15){
        alert("Sectiunea 'Password' trebuie sa aiba maxim 15 caractere");
        form.userPassword.focus();
        form.userPassword.value = "";
        return false;
    }

    return true;
}