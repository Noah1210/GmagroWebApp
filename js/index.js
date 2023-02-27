


//Verify passwords match in profile

function verifyPassword() {
    var button = document.getElementById("buttonProfile");
    var pw1 = document.getElementById("password1").value;
    var pw2 = document.getElementById("password2").value;
    let passwordReq = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])");
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



const ctx = document.getElementById('tpsInterv');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });