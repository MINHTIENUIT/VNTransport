// Get the modal
var signup = document.getElementById('signup');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == signup) {
        signup.style.display = "none";
    }
}