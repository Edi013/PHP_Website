function validateAdd(){
    var form = document.forms["addAppointment"];

    if(form["name"].value.length <= 2){
        alert("Sectiunea 'Subject name' trebuie sa aiba minim 3 caractere");
        form.name.focus();
        form.name.value = "";
        return false;
    }
    if(form["name"].value.length > 15){
        alert("Sectiunea 'Subject name' trebuie sa aiba maxim 15 caractere");
        form.name.focus();
        form.name.value = "";
        return false;
    }

    if(form["day"].value.length < 6){
        alert("Sectiunea 'Day' trebuie sa aiba minim 6 caractere");
        form.day.focus();
        form.day.value = "";
        return false;
    }
    if(form["day"].value.length > 9){
        alert("Sectiunea 'Day' trebuie sa aiba maxim 9 caractere");
        form.day.focus();
        form.day.value = "";
        return false;
    }

    if(!/^[0-9]{2}$/.test(form["beginningHour"].value)){
        alert("Sectiunea 'Beginning hour' trebuie sa fie numar de 2 cifre!");
        form.beginningHour.focus();
        form.beginningHour.value = "";
        return false;
    }
    if(form["beginningHour"].value < 0 || form["beginningHour"].value > 23){
        alert("Sectiunea 'Beginning hour' trebuie sa fie un numar cuprins intre 00 - 23");
        form.beginningHour.focus();
        form.beginningHour.value = "";
        return false;
    }

    if(!/^[0-9]{2,3}$/.test(form["duration"].value)){
        alert("Sectiunea 'Durata' trebuie sa fie un numar de 2 sau 3 cifre");
        form.duration.focus();
        form.duration.value = "";
        return false;
    }
    if(form["duration"].value < 2 || form["duration"].value > 500){
        alert("Sectiunea 'Durata' trebuie sa fie un numar cuprins intre 2 - 500");
        form.duration.focus();
        form.duration.value = "";
        return false;
    }

    return true;
}

function validateModify(){
    var form = document.forms["modifyAppointment"];

    if(!/^[0-9]{2}$/.test(form["oldBeginningHour"].value)){
        alert("Sectiunea 'Old beginning hour' trebuie sa fie numar de 2 cifre!");
        form.oldBeginningHour.focus();
        form.oldBeginningHour.value = "";
        return false;
    }
    if(form["oldBeginningHour"].value < 0 || form["oldBeginningHour"].value > 23){
        alert("Sectiunea 'Old beginning hour' trebuie sa fie un numar cuprins intre 00 - 23");
        form.oldBeginningHour.focus();
        form.oldBeginningHour.value = "";
        return false;
    }

    if(!/^[0-9]{2}$/.test(form["newBeginningHour"].value)){
        alert("Sectiunea 'New beginning hour' trebuie sa fie numar de 2 cifre!");
        form.newBeginningHour.focus();
        form.newBeginningHour.value = "";
        return false;
    }
    if(form["beginningHour"].value < 0 || form["newBeginningHour"].value > 23){
        alert("Sectiunea 'New beginning hour' trebuie sa fie un numar cuprins intre 00 - 23");
        form.newBeginningHour.focus();
        form.newBeginningHour.value = "";
        return false;
    }


    if(form["oldDay"].value.length < 6){
        alert("Sectiunea 'Old day' trebuie sa aiba minim 6 caractere");
        form.oldDay.focus();
        form.oldDay.value = "";
        return false;
    }
    if(form["oldDay"].value.length > 9){
        alert("Sectiunea 'Old day' trebuie sa aiba maxim 9 caractere");
        form.oldDay.focus();
        form.oldDay.value = "";
        return false;
    }

    if(form["newDay"].value.length < 6){
        alert("Sectiunea 'New day' trebuie sa aiba minim 6 caractere");
        form.newDay.focus();
        form.newDay.value = "";
        return false;
    }
    if(form["newDay"].value.length > 9){
        alert("Sectiunea 'New day' trebuie sa aiba maxim 9 caractere");
        form.newDay.focus();
        form.newDay.value = "";
        return false;
    }

        return true;
}

function validateDelete(){
    var form = document.forms["deleteAppointment"];

    if(!/^[0-9]{2}$/.test(form["beginningHourToDelete"].value)){
        alert("Sectiunea 'Beginning hour' trebuie sa fie numar de 2 cifre!");
        form.beginningHourToDelete.focus();
        form.beginningHourToDelete.value = "";
        return false;
    }
    if(form["beginningHourToDelete"].value < 0 || form["beginningHourToDelete"].value > 23){
        alert("Sectiunea 'Beginning hour' trebuie sa fie un numar cuprins intre 00 - 23");
        form.beginningHourToDelete.focus();
        form.beginningHourToDelete.value = "";
        return false;
    }


    if(form["dayToDelete"].value.length < 6){
        alert("Sectiunea 'Day' trebuie sa aiba minim 6 caractere");
        form.dayToDelete.focus();
        form.dayToDelete.value = "";
        return false;
    }
    if(form["dayToDelete"].value.length > 9){
        alert("Sectiunea 'Day' trebuie sa aiba maxim 9 caractere");
        form.dayToDelete.focus();
        form.dayToDelete.value = "";
        return false;
    }

        return true;
}