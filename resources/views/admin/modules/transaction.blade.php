@extends('admin.layouts.main') @section('page')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content ">
            <div class="card-title clearfix">
                <h4 class="pull-left">Danh Sách Đơn Hàng</h4>
                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAdd">
                    Add new
                </button>
            </div>
            <div class="table-responsive ">
                <table class="table table-shopping">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Trạng Thái</th>
                            <th>Tên khách hàng</th>                          
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Tổng Giá</th>
                            <th>Ghi chú</th>
                            <th>Địa chỉ</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaction as $key=>$item)
                        <tr>
                            <td class="text-center">{{++$key}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->user_name}}</td>
                            <td>{{$item->user_email}}</td>
                            <td class="currency">{{$item->user_phone}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->message}}</td>
                            <td>{{$item->address}}</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" id="btnEdit" onclick="editModal({{$item->id}})" data-toggle="modal" data-target="#modalEdit"
                                    class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger" onclick="deleteModal({{$item->id}})">
                                    <i class="material-icons" data-toggle="modal" data-target="#modalDelete">close</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection