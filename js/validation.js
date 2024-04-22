function ValidationForm(){
    if(document.myForm.fname.value==""){
        document.getElementById("nameErr").innerHTML="Please enter your First Name";
        document.myForm.fname.focus();
        return false;
    }

    else{
        var regex = /^[a-zA-Z-' ]*$/;
        if(regex.test(document.myForm.fname.value) == false){
            alert("Only letters and white space allowed");
            document.myForm.fname.focus();
            return false;
        }
    }

    if(document.myForm.lname.value==""){
        document.getElementById("lnameErr").innerHTML="Please enter your Last Name";
        document.myForm.lname.focus();
        return false;
    }

    else{
        var regex = /^[a-zA-Z-' ]*$/;
        if(regex.test(document.myForm.lname.value) == false){
            alert("Only letters and white space allowed");
            document.myForm.lname.focus();
            return false;
        }
    }
    if(document.myForm.email.value==""){
        document.getElementById("emailErr").innerHTML="Please enter your E-mail";
        document.myForm.email.focus();
        return false;
    }

    else{
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(document.myForm.email.value) == false){
            alert("Please enter a valid email address");
            document.myForm.email.focus();
            return false;
        }
    }

    if(document.myForm.address.value == ""){
        document.getElementById("AddErr").innerHTML="Please enter your complete Address";
        document.myForm.address.focus();
        return false;
    }

    if(document.myForm.gender.value==""){
        document.getElementById("genderErr");
        alert="Please select your Gender";
        document.myForm.gender.focus();
        return false;
    }

    /*if(document.myForm.dob.value==""){
        document.getElementById("dobErr").innerHTML="Please enter your Date Of Birth ";
        document.myForm.dob.focus();
        return false;
    }*/

}
