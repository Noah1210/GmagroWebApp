
//Verify passwords match in profile

function verifyPassword() {
    var button = document.getElementById("buttonProfile");
    var pw1 = document.getElementById("password1").value;
    var pw2 = document.getElementById("password2").value;
    let passwordReq = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])');
    if (passwordReq.test(pw1) && passwordReq.test(pw2)) {
        if (pw1 == pw2) {
            document.getElementById("formProfile").submit();
        } else {
            window.alert("Les mots de passe ne corresponde pas");
        }
    } else {
        window.alert("Il vous faut au moin une majuscule, une minuscule et un chiffre");
    }
}



