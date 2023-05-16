function validateLogin(){
    var form = document.forms["Login"];

    if(form["userName"].value.legth < 2){
        alert("Sectiunea 'Username' trebuie sa aiba minim 2 caractere");
        form.userName.focus();
        form.userName.value = "";
        return false;
    }
    if(form["userName"].value.legth > 15){
        alert("Sectiunea 'Username' trebuie sa aiba maxim 15 caractere");
        form.userName.focus();
        form.userName.value = "";
        return false;
    }

    
    if(form["userPassword"].value.legth < 2){
        alert("Sectiunea 'Password' trebuie sa aiba minim 2 caractere");
        form.userPassword.focus();
        form.userPassword.value = "";
        return false;
    }
    if(form["userPassword"].value.legth > 15){
        alert("Sectiunea 'Password' trebuie sa aiba maxim 15 caractere");
        form.userPassword.focus();
        form.userPassword.value = "";
        return false;
    }

    alert("final");
    return true;
}