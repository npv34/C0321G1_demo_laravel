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
    });

    $('#search-user').keyup(function () {
        let value = $(this).val();
        if (value) {
            let origin = window.origin;
            // goi ajax
            $.ajax({
                url: origin + '/admin/users/search',
                method: 'GET',
                data: {
                    keyword: value
                },
                // goi ajax thanh cong
                success: function (res) {
                    let users = res.data;
                    let html = '';
                    $.each(users, function (index, item) {
                        html += '<li class="list-group-item">';
                        html += item.name;
                        html += '</li>';
                    });

                    $('#list-user-search').html(html);
                },
                // goi ajax that bai
                error: function (err) {

                }
            })
        } else {
            $('#list-user-search').html('');
        }
    })

})
