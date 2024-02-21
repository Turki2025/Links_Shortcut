function check(event){
    var error=false;
    var user = entrance.user.value;
    var password = entrance.password.value;
    if(user == "" || password == ""){
      alert("الرجاء إدخال اسم المستخدم أو كلمة المرور ");
      error=true;
    } 
    if(error){
      event.preventDefault();
    }
  }
