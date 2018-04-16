<body onload="loginVerification()";>
<div id="loginPara">
<form id="userDetails" onsubmit="return false">
Email: <input type="email" id="emailInput"> <br>
Password: <input type="password" id="passwordInput"> <br>
<input type="submit" onclick="signIn()">
</form>
</div>

<p id="LoginFaiure" style="color: red;"> </p>

<script>
// verify if the email is in local storage
function loginVerification () {
    if(localStorage.loggedInUsrEmail !== undefined) {
        var loggedInUser= JSON.parse(localStorage[localStorage.loggedInUsrEmail]);

        document.getElementById("loginPara").innerHTML= loggedInUser.firstName + "logged in";
    }
}

function signIn() {
    var email= document.getElementById("emailInput").value;

    if (localStorage(email) === undefined) {

        document.getElementById("LoginFailure").innerHTML= "Sorry This email does not exist. Do you have an account?";
        return;
    }

    else{
        //user has an account
    
    var loggedInUser= JSON.parse(localStorage[email]);// convert json string to object

    var password= document.getElementById("passwordInput").value;

    if (password === loggedInUser.password) {
        document.getElementById("loginPara").innerHTML=loggedInUser.firstName 
        + "has logged in.";
        document.getElementById("LoginFailure").innerHTML= ""; //clear any login failures
        localStorage.loggedInUsrEmail= loggedInUsr.email;
    }
    else {
        document.getElementById("LoginFaiure").innerHTML= "Sorry password is not correct please try again.";
    }
}
}
</script>
</body>