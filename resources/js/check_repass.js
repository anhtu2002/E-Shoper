function check_repass() {
    var pass = document.getElementById("password").value;
    var re_pass = document.getElementById("re_pass").value;
    var btn = document.getElementById("btn_submit");
    var mess = document.getElementById("error");
    if (re_pass != "" && pass !== re_pass) {
        btn.disabled = true;
        mess.style.visibility = "visible";
    } else {
        btn.disabled = false;
        mess.style.visibility = 'hidden';
    }
}
