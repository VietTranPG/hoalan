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
                                <button type="button" class="btn btn-info btn-round">Thanh Toán
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
<script>
    $(document).ready(function () {
        function bindCart(img, name, price, discount, qty) {
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
                                <small>by Dolce&Gabbana</small>
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
                                    <button class="btn btn-round btn-info btn-xs">
                                        <i class="material-icons">remove</i>
                                    </button>
                                    <button class="btn btn-round btn-info btn-xs">
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
                                <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>`;
            $('tbody').prepend(row);
        };

        (function getCart() {
            var user = JSON.parse(localStorage.getItem('user'));
            $.ajax({
                type: "GET",
                url: '/cart-detail',
                headers: {
                    "token": user.remember_token,
                },
                dataType: 'json',
                success: function (res) {
                    if (res) {
                        var details = res.data.details;
                        var total = 0;
                        for (var i = 0; i < details.length; i++) {
                            bindCart(details[i].image_link, details[i].name, details[i].price,
                                details[i].discount, details[i].qty);
                                total = total+((details[i].price*details[i].qty*details[i].discount)/100);
                        }
                        $('#total').text(total);
                    }

                }
            });
        })();
    })
</script>
@endsection