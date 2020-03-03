window.onload = function(){
    //Get the Modal
    var modal = document.getElementById("loginModal");

    //Get the registerBtn
    var registerbtn = document.getElementById("registerButton");

    //Get the loginBtn
    var loginbtn = document.getElementById("loginButton");

    //Get the Span
    var span = document.getElementsByClassName("close")[0]

    //OPENING THE MODAL
    // When the user clicks on the Loginbutton, open the modal
    registerbtn.onclick = function() {
        modal.style.display = "block";
    }

    //When the user clicks on the 'x' marker, close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event){
        if (event.target == modal){
            modal.style.display = "none";
        }
    }
}

