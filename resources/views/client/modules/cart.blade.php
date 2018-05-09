 @extends('client.layouts.main') @section('page')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Shopping Cart Table</h4>
            <div class="table-responsive">
                <table class="table table-shopping">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>Sản phẩm</th>
                            <th class="text-right">Giá</th>
                            <th class="text-right">Số Lượng</th>
                            <th class="text-right">Thành Tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="dynamic-data">

                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="4"></td>
                            <td class="td-total">
                                Tổng
                            </td>
                            <td colspan="1" class="td-price" id="total">

                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="2" class="text-right">
                                <button type="button" class="btn btn-info btn-round submit">Thanh Toán
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h5 class="modal-title text-center" id="myModalLabel">Xác nhận thông tin giao hàng</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal">
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Địa chỉ nhận hàng</label>
                                            <div class="col-sm-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" id="address" class="form-control" value>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Sđt nhận hàng</label>
                                            <div class="col-sm-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" id="phone" class="form-control" value>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left">Ghi chú</label>
                                            <div class="col-sm-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <textarea id="message" class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-info btn-round" data-dismiss="modal" onclick="addcart()">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var details;

        function bindCart(id, img, name, price, discount, qty, category) {
            var row =
                `<tr>
                            <td>
                                <div class="img-container">
                                    <img src="./upload/product/` +
                img +
                `" alt="...">
                                </div>
                            </td>
                            <td class="td-name">
                                <a href="#jacket">` +
                name +
                `</a>
                                <br />
                                <small>` +
                category +
                `</small>
                            </td>                          
                            <td class="td-number text-right">
                                ` +
                price * discount / 100 +
                `
                            </td>
                            <td class="td-number">
                                ` +
                qty +
                `
                                <div class="btn-group">
                                    <button class="btn btn-round btn-info btn-xs sub"  id="` +
                id +
                `">
                                        <i class="material-icons">remove</i>
                                    </button>
                                    <button class="btn btn-round btn-info btn-xs add"  id="` +
                id +
                `">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                            </td>
                            <td class="td-number">
                                ` +
                (price * qty) * discount / 100 +
                `
                            </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" data-placement="left" id="` +
                id +
                `" title="Xoá khỏi giỏ hàng" class="btn btn-simple close">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>`;
            $('#dynamic-data').append(row);
        };

        (function getCart() {
            var cart = localStorage.getItem('cart');
            if (cart) {
                details = JSON.parse(cart);
                handleData();
            }
        })();

        function handleData() {
            var total = 0;
            localStorage.setItem('cart', JSON.stringify(details));
            setNumberCart();
            $('#dynamic-data').html('');
            for (var i = 0; i < details.length; i++) {
                bindCart(details[i].id, details[i].img, details[i].name,
                    details[i].price,
                    details[i].discount, details[i].qty, details[i].category);
                total = total + ((details[i].price * details[i].qty * details[i].discount) /
                    100);
            }
            $('#total').text(total);
            initEvent();
        }

        function initEvent() {
            $('.sub').click(function () {
                var id = this.id
                var index = details.findIndex(x => x.id == id);
                if (details[index].qty != 1) {
                    details[index].qty--;
                } else {
                    details.splice(index, 1);
                }
                handleData();
            });
            $('.add').click(function () {
                var id = this.id
                var index = details.findIndex(x => x.id == id);
                details[index].qty++;
                handleData();
            });
            $('.close').click(function () {
                var id = this.id
                var index = details.findIndex(x => x.id == id);
                details.splice(index, 1);
                handleData();
            })
        }
        $('.submit').click(function () {
            if (details) {
                $('#noticeModal').modal('show');
            }
        })
    })

    function addcart() {
        var cart = localStorage.getItem('cart');
        if (cart) {
            var user = JSON.parse(localStorage.getItem('user'));
            var data = {
                "phone": $('#phone').val(),
                "address": $('#address').val(),
                "message": $('#message').val(),
                "product": JSON.parse(cart)
            }
            $.ajax({
                type: "POST",
                url: '/addcart',
                data: data,
                dataType: 'json',
                headers: {
                    "token": user.remember_token,
                },
                success: function (res) {
                    if(res.status==1){
                        localStorage.removeItem('cart');
                        location.href = "/";
                    }else{
                        alert(res.message);
                    }
                }
            });
        } else {
            alert("Giỏ hàng trống!")
        }

    }
</script>

@endsection