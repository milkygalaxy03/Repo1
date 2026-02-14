function validateLogin() {
    let user = document.getElementById("username").value;
    let pass = document.getElementById("password").value;

    if (user === "" || pass === "") {
        alert("Fields cannot be empty!");
        return false;
    }
    return true;
}
