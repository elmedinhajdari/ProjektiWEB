window.onscroll = function() { fixedNavbar() };

var header1 = document.getElementById("nav1");

function fixedNavbar() {
    if (window.pageYOffset > 30) {
        header1.classList.add("fixednav");
    } else {
        header1.classList.remove("fixednav");
    }
}



function validation() {
    var emri = document.getElementById('emri').value;
    var mbiemri = document.getElementById('mbiemri').value;
    var email = document.getElementById('email').value;
    var error=[];

    var emricheck = /^[A-Z][a-z]{0,}/;
    var mbiemricheck = /^[A-Z][a-z]{0,}/;
    var emailcheck = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

    if (emricheck.search(emri)) {
        error.push("Name Surename should have an uppercase and should have only letters!");
    }
    if (mbiemricheck.search(mbiemri)) {
        error.push("Surename should have an uppercase and should have only letters!");
    }
    if (emailcheck.search(email)) {
        error.push("Wrong email!");
    }
    if(error.length>0){
        alert(error.join("\n"));
        return false;
    }
    return true;
}





function login() {

    var e = document.getElementById('e').value;
    var p = document.getElementById('p').value;
    var emailcheck = /^([a-zA-Z0-9.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
    var errors = [];

    if (e.search(emailcheck)) {
        errors.push("Type a valid e-mail address.");
    }
    if (p.length < 9) {
        errors.push("Password must be at least 9 characters");
    }
    if (p.length > 16) {
        errors.push("Password must be at max 16 characters");
    }
    if (p.search(/[A-Z]/) < 0) {
        errors.push("Password must contain at least one upper case letter.");
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
}
