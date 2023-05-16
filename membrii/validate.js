function validateAdd(){
    var form = document.forms["addMember"];

    if(form["firstName"].value.length <= 2){
        alert("Sectiunea 'First name' trebuie sa aiba minim 3 caractere");
        form.firstName.focus();
        form.firstName.value = "";
        return false;
    }
    if(form["firstName"].value.length > 15){
        alert("Sectiunea 'First name' trebuie sa aiba maxim 15 caractere");
        form.firstName.focus();
        form.firstName.value = "";
        return false;
    }

    
    if(form["lastName"].value.length <= 2){
        alert("Sectiunea 'Last name' trebuie sa aiba minim 3 caractere");
        form.lastName.focus();
        form.lastName.value = "";
        return false;
    }
    if(form["lastName"].value.length > 15){
        alert("Sectiunea 'Last name' trebuie sa aiba maxim 15 caractere");
        form.lastName.focus();
        form.lastName.value = "";
        return false;
    }

        return true;
}

function validateModify(){
    var form = document.forms["modifyMember"];

    if(form["lastNameToModify"].value.length <= 2){
        alert("Sectiunea 'Old last name' trebuie sa aiba minim 3 caractere");
        form.lastNameToModify.focus();
        form.lastNameToModify.value = "";
        return false;
    }
    if(form["lastNameToModify"].value.length > 15){
        alert("Sectiunea 'Old last name' trebuie sa aiba maxim 15 caractere");
        form.lastNameToModify.focus();
        form.lastNameToModify.value = "";
        return false;
    }

    
    if(form["newFirstName"].value.length <= 2){
        alert("Sectiunea 'New first name' trebuie sa aiba minim 3 caractere");
        form.newFirstName.focus();
        form.newFirstName.value = "";
        return false;
    }
    if(form["newFirstName"].value.length > 15){
        alert("Sectiunea 'New first name' trebuie sa aiba maxim 15 caractere");
        form.newFirstName.focus();
        form.newFirstName.value = "";
        return false;
    }

    if(form["newLastName"].value.length <= 2){
        alert("Sectiunea 'New last name' trebuie sa aiba minim 3 caractere");
        form.newLastName.focus();
        form.newLastName.value = "";
        return false;
    }
    if(form["newLastName"].value.length > 15){
        alert("Sectiunea 'New last name' trebuie sa aiba maxim 15 caractere");
        form.newLastName.focus();
        form.newLastName.value = "";
        return false;
    }

        return true;
}

function validateDelete(){
    var form = document.forms["deleteMember"];

    if(form["lastNameToDelete"].value.length <= 2){
        alert("Sectiunea 'Last name' trebuie sa aiba minim 3 caractere");
        form.lastNameToDelete.focus();
        form.lastNameToDelete.value = "";
        return false;
    }
    if(form["lastNameToDelete"].value.length > 15){
        alert("Sectiunea 'Last name' trebuie sa aiba maxim 15 caractere");
        form.lastNameToDelete.focus();
        form.lastNameToDelete.value = "";
        return false;
    }

        return true;
}