function validateForm() {
    var firstname = document.forms["myForm"]["firstname"].value.trim();
    var lastname = document.forms["myForm"]["lastname"].value.trim();
    var email = document.forms["myForm"]["email"].value.trim();
    var invoice_id = document.forms["myForm"]["invoice_id"].value.trim();
    var error = "";

    // Kiểm tra trường First Name
    if (firstname == "") {
        error += "First Name is required.\n";
    } else if (!/^[\p{L}\s]+$/u.test(firstname)) {
        error += "Tên chỉ được chứa các chữ cái và dấu cách.\n";
    }

    // Kiểm tra trường Last Name
    if (lastname == "") {
        error += "Last Name is required.\n";
    } else if (!/^[\p{L}\s]+$/u.test(lastname)) {
        error += "Họ chỉ được chứa các chữ cái và dấu cách.\n";
    }

    // Kiểm tra trường Email
    if (email == "") {
        error += "Email is required.\n";
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        error += "Một Email hợp lệ là bắt buộc\n";
    }

    // Kiểm tra trường Invoice ID
    if (invoice_id == "") {
        error += "Invoice ID is required.\n";
    } else if (!/^\d+$/.test(invoice_id)) {
        error += "ID hóa đơn phải là một số.\n";
    }

    // Nếu có lỗi, hiển thị thông báo và ngăn chặn gửi form
    if (error != "") {
        alert(error);
        return false;
    }
    return true;
}
