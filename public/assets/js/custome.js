$(document).ready(function () {
    var currentUrl = window.location.href;
    var currentPage = currentUrl.split('/').pop();
    if (currentPage) {
        $('#' + currentPage).addClass('active');
    }
    $('.cart').click(function () {
        if (localStorage.getItem('user')) {
            var user = JSON.parse(localStorage.getItem('user'));
            addToCart(this.id, user.remember_token);
        } else {
            $('#modalLogin').modal('show');
        }
    })
    $('#openLogin').click(function () {
        openLogin();
    })
    $('#openRegister').click(function () {
        openRegister();
    })
    $('#register').click(function () {
        register();
    })
    $('#login').click(function () {
        login();

    })

    function openLogin() {
        $('#title').text('Đăng Nhập');
        $('#formRegister').addClass('hide');
        $('#formLogin').removeClass('hide');
        $('#openLogin').addClass('hide');
        $('#openRegister').removeClass('hide');
    }

    function openRegister() {
        $('#title').text('Đăng Ký');
        $('#formRegister').removeClass('hide');
        $('#formLogin').addClass('hide');
        $('#openRegister').addClass('hide');
        $('#openLogin').removeClass('hide');
    }

    function login() {
        var data = $('#formLogin').serializeArray();
        var request = handleArrForm(data);

    }

    function register() {
        var data = $('#formRegister').serializeArray();
        var request = handleArrForm(data);
        $.ajax({
            type: "POST",
            url: '/register',
            data: data,
            dataType: 'json',
            success: function (res) {
                if (res.status == 1) {
                    localStorage.setItem('user', JSON.stringify(res.data));
                    $('#modalLogin').modal('hide');
                } else {
                    console.log(res)
                    alert(res.message);
                }
            }
        });
    }

    function addToCart(id, token) {
        $.ajax({
            type: "GET",
            url: '/addCart/' + id,
            headers: {
                "token": token,
            },
            dataType: 'json',
            success: function (res) {
                if (res.status == 1) {
                    demo.showNotification('top', 'center', 'Sản phẩm đã thêm vào giỏ')
                } else {
                    alert(res.message);
                }
            }
        });
    }

    function handleArrForm(arr) {
        var request = {};
        for (var i = 0; i < arr.length; i++) {
            request[arr[i].name] = arr[i].value;
        }
        return request;
    }
});

function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            console.log(e)
            $('#' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}