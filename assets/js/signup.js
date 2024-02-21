function check(event) {
    var error = false;
    var cname = creates.name.value;
    if (cname == "") {
        alert("الرجاء ادخل الأسم");
        error = true;
    }
    var cuser = creates.user.value;
    if (cuser == "") {
        alert("الرجاء ادخل اسم المستخدم");
        error = true;
    }
    var cemail = creates.email.value;
    if (cemail == "") {
        alert("الرجاء ادخل البريد الإلكتروني");
        error = true;
    }
    var cpassword = creates.password.value;
    if (cpassword.length < 8) {
        alert("الرجاء التحقق من ادخال 8 أحرف أو أكثر لكلمة المرور ");
        error = true;
    }
    if (error) {
        event.preventDefault();
    }
}
function checkUser(event){
    if(event.data== ' '){
        alert("الرجاء عدم وضع مسافات داخل اسم المستخدم");
        var input=event.target;
        input.value=input.value.replace(' ','');
    }
    
}