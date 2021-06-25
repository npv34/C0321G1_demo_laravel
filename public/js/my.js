// document.getElementById('password').onkeyup = function () {
//     let password = document.getElementById('password').value;
//     let content = '';
//     let colorText = '';
//     let borderStyle = '';
//     if (password.length < 4) {
//         content = 'Mat khau yeu'
//         colorText = 'red'
//         borderStyle = '2px solid red'
//     } else if (password.length < 6) {
//         content = 'Mat khau trung binh'
//         colorText = 'orange'
//         borderStyle = ' 2px solid orange'
//     } else  {
//         content = 'Mat khau manh'
//         colorText = 'green'
//         borderStyle = '2px solid green'
//     }
//     document.getElementById('message-password').innerHTML = content
//     document.getElementById('message-password').style.color = colorText
//     document.getElementById('password').style.border = borderStyle;
// }
//
//

$(document).ready(function () {
    $('#password').keyup(function () {
        let value = $(this).val();
        let content = '';
        let colorText = '';
        let borderStyle = '';
        if (value.length < 4) {
            content = 'Mat khau yeu';
            colorText = 'red';
            borderStyle = '2px solid red';
        } else if (value.length < 6) {
            content = 'Mat khau trung binh'
            colorText = 'orange'
            borderStyle = ' 2px solid orange'
        } else {
            content = 'Mat khau manh'
            colorText = 'green'
            borderStyle = '2px solid green'
        }
        $('#message-password').html(content).css('color', colorText);
        $('#password').css('border', borderStyle);
    })

    $('#show-password').click(function (){
        let typePassword = $('#password').attr('type');
        if (typePassword === 'password') {
            $('#password').attr('type', 'text');
            $("#icon-eye").attr('class', 'fas fa-eye')
        } else {
            $('#password').attr('type', 'password');
            $("#icon-eye").attr('class', 'fas fa-eye-slash')
        }
    })

})
