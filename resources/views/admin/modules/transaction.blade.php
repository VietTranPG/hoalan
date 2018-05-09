@extends('admin.layouts.main') @section('page')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content ">
            <div class="card-title clearfix">
                <h4 class="pull-left">Danh Sách Đơn Hàng</h4>
            </div>
            <div class="table-responsive ">
                <table class="table table-shopping">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Trạng thái</th>
                            <th>Tên Khách</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Ghi Chú</th>
                            <th>Ngày tạo</th>
                            <th>Địa chỉ giao</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaction as $key=>$item)
                        <tr onclick="showDetails({{json_encode($item)}})">
                            <td class="text-center">{{++$key}}</td>
                            <td>{{$item->status==1?'Chưa giao':'Đã giao'}}</td>
                            <td>{{$item->user_name}}</td>
                            <td>{{$item->user_email}}</td>
                            <td>{{$item->user_phone}}</td>
                            <td>{{$item->message}}</td>
                            <td>{{$item->created}}</td>
                            <td>{{$item->address}}</td>
                            <td class="td-actions text-right">
                                <button class="btn btn-rose btn-fill" onclick="demo.showSwal()">Try me!</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h5 class="modal-title text-center" id="myModalLabel">Chi tiết đơn hàng</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">

                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script>
    function bindData(name, price, discount, qty, img) {
        return `<div class="row">
                        <div class="col-md-4">
                            <strong>`+name+`</strong>
                            <p>Giá gốc:`+price+`</p>
                        </div>
                        <div class="col-md-4">
                            <p>giảm giá: `+discount+`</p>
                            <p>Số lượng: `+qty+`</p>
                        </div>
                        <div class="col-md-4">
                            <div class="picture">
                                <img  src="./upload/product/`+img+`" alt="Thumbnail Image" class="img-rounded img-responsive">
                            </div>
                        </div>
                    </div> <hr/>`;
    }

    function showDetails(item) {
        var template='';
        $('.instruction').html('');
        for(var i=0;i<item.product.length;i++){
            var product = item.product[i];
            template+=bindData(product.product_name,product.price,product.discount,product.qty,product.image_link)
        }
        $('.instruction').append(template);
        $('#details').modal('show');
    }
</script>
<style>
    tr:hover {
        background-color: #f5f5f5;
        cursor: pointer;
    }

    .swal-wide {
        width: 850px !important;
    }
    .row{
        margin-bottom: 10px;
    }
</style>
@endsection