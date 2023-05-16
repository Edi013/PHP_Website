function validateAdd(){
    var form = document.forms["addSubject"];

    if(form["name"].value.length <= 2){
        alert("Sectiunea 'Name' trebuie sa aiba minim 3 caractere");
        form.name.focus();
        form.name.value = "";
        return false;
    }
    if(form["name"].value.length > 35){
        alert("Sectiunea 'Name' trebuie sa aiba maxim 35 caractere");
        form.name.focus();
        form.name.value = "";
        return false;
    }

    return true;
}

function validateModify(){
    var form = document.forms["modifySubject"];

    if(form["oldName"].value.length <= 2){
        alert("Sectiunea 'Old name' trebuie sa aiba minim 3 caractere");
        form.oldName.focus();
        form.oldName.value = "";
        return false;
    }
    if(form["oldName"].value.length > 35){
        alert("Sectiunea 'Old name' trebuie sa aiba maxim 35 caractere");
        form.oldName.focus();
        form.oldName.value = "";
        return false;
    }

    if(form["newName"].value.length <= 2){
        alert("Sectiunea 'New name' trebuie sa aiba minim 3 caractere");
        form.newName.focus();
        form.newName.value = "";
        return false;
    }
    if(form["newName"].value.length > 35){
        alert("Sectiunea 'New name' trebuie sa aiba maxim 35 caractere");
        form.newName.focus();
        form.newName.value = "";
        return false;
    }

        return true;
}

function validateDelete(){
    var form = document.forms["deleteSubject"];

    if(form["nameToDelete"].value.length <= 2){
        alert("Sectiunea 'Name' trebuie sa aiba minim 3 caractere");
        form.nameToDelete.focus();
        form.nameToDelete.value = "";
        return false;
    }
    if(form["nameToDelete"].value.length > 35){
        alert("Sectiunea 'Name' trebuie sa aiba maxim 35 caractere");
        form.nameToDelete.focus();
        form.nameToDelete.value = "";
        return false;
    }

        return true;
}