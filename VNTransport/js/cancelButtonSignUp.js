// Get the modal
var login = document.getElementById('login');
var signup = document.getElementById('signup');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == login) {
        login.style.display = "none";
    }
    if (event.target == signup) {
        signup.style.display = "none";
    }
}
