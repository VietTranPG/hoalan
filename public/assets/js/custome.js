$(document).ready(function () {
    var currentUrl = window.location.href;
    var currentPage = currentUrl.split('/').pop();
    if (currentPage) {
        $('#' + currentPage).addClass('active');
    }
    $('.cart').click(function () {
        var cart = localStorage.getItem('cart');
        var pId = this.id;
        var obj = {
            id: pId,
            name: this.name,
            img: $(this).attr('img'),
            price: $(this).attr('price'),
            discount: $(this).attr('discount'),
            category: $(this).attr('category'),
            qty: 1
        }
        if (cart) {
            cart = JSON.parse(cart);
            var index = cart.findIndex(x => x.id == pId);
            if (index > -1) {
                cart[index].qty++;
            } else {
                cart.push(obj);
            }
        } else {
            cart = [];
            cart.push(obj);
        }
        demo.showNotification('top', 'center', 'Sản phẩm đã thêm vào giỏ');
        localStorage.setItem('cart', JSON.stringify(cart));
        setNumberCart();
    })

    setNumberCart();
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
        $.ajax({
            type: "POST",
            url: '/login',
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

function setNumberCart() {
    var cart = localStorage.getItem('cart');
    var number = 0;
    if (cart) {
        cart = JSON.parse(cart);
        for (var i = 0; i < cart.length; i++) {
            number += cart[i].qty;
        }
        $('.notification').html(number);
    } else {
        $('.notification').html('0');
    }
}