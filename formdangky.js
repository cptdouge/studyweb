function send(){
    var id =document.getElementById("username").value;
    var pwd = document.getElementById("pwd").value;
    var confirmpwd = document.getElementById("confirmpwd").value;
    var lastname = document.getElementById("lastname").value;
    var firstname = document.getElementById("firstname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    let pwdpattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/;
    let emailpattern = /.*@gmail.com/;
    let phonepattern = /[0-9]{12,12}/;
    let check = false;


    if(id == "" || pwd == "" || confirmpwd == "" || lastname == "" || firstname == ""||
    email == ""|| phone == ""){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return check;
    }
    else if(id.includes(" ") || !id.slice(0,1).match(/^[a-z]/)){
        alert("Tên đăng nhập không có khoảng trắng và bắt đầu bằng 1 kí tự!");
        return check;
    }
    else if(!pwd.match(pwdpattern)){
        alert("Mật khẩu phải từ 8-16 kí tự, có kí tự, kí số và kí tự đặc biệt, có chữ hoa và thường và không chứa tên người dùng");
        return check;
    }
    else if(!confirmpwd.match(pwd)){
        alert("Nhập lại mật khẩu không trùng khớp!");
        return check;
    }
    else if(!email.match(emailpattern)){
        alert("Email phải có dạng user@gmail.com!");
        return check;
    }
    else if(!phone.match(phonepattern)){
        alert("Số điện thoại phải có 12 kí số!");
        return check;
    }
    else{
        alert("Đăng ký thành công!");
        check = true;
        return check;
    }
}