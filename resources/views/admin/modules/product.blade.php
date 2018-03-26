@extends('admin.layouts.main') @section('page')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content ">
            <div class="card-title clearfix">
                <h4 class="pull-left">Danh Sách Sản Phẩm</h4>
                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAdd">
                    Add new
                </button>
            </div>
            <div class="table-responsive ">
                <table class="table table-shopping">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Tên</th>
                            <th>Loại</th>
                            <th>Giá</th>
                            <th>Giảm Giá</th>
                            <th>Ảnh</th>
                            <th>Số lượng xem</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $key=>$item)
                        
                        <tr>
                            <td class="text-center">{{++$key}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->name}}</td>
                            <td class="currency">{{$item->price}}</td>
                            <td>{{$item->discount}} %</td>
                            <td>
                                <img class="img-container" src="./upload/product/{{$item->image_link}}" />
                            </td>
                            <td>{{$item->view}}</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" id="btnEdit" onclick="editModal({{$item}})" data-toggle="modal" data-target="#modalEdit"
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
<!-- Modal Add-->
<div id="modalAdd" class="modal fade" role="dialog">
    <form action="product/add" id="formAdd" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm mới sản phẩm</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Giá (VNĐ)</label>
                                <input type="number" value="0" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="catalog_id">
                                    @foreach($category as $key=>$item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giảm Giá (%)</label>
                                <input type="number" value="0" name="discount" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="fileAdd" class="btn btn-danger">Chọn ảnh...</label>
                        <div hidden>
                            <input id="fileAdd" type="file" name="image" required />
                        </div>
                        <img id="imgAdd" />
                    </div>
                    <div class="row">
                        <textarea name="content" id="editer1" class="form-control">
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnAdd">Thêm</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Modal Edit-->
<div id="modalEdit" class="modal fade" role="dialog">
    <form action="product/update" id="formEdit" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa Sản Phẩm</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div hidden>
                            <input type="text" name="id" id="idEdit" class="form-control" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" name="name" id="nameEdit" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Giá (VNĐ)</label>
                                <input type="number" value="0" id="priceEdit" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="catalog_id" id="catelogEdit">
                                    @foreach($category as $key=>$item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giảm Giá (%)</label>
                                <input type="number" value="0" name="discount" id="discountEdit" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="fileEdit" class="btn btn-danger">Chọn ảnh...</label>
                        <div hidden>
                            <input id="fileEdit" type="file" name="image"/>
                        </div>
                        <img id="imgEdit" />
                    </div>
                    <div class="row">
                        <textarea name="content" id="contentEdit" class="form-control">
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Modal delete-->
<div id="modalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xóa nhé</h4>
            </div>
            <div class="modal-body">
                <form action="news/delete" method="POST">
                    <div class="form-group" hidden>
                        <label for="exampleInputEmail1">id</label>
                        <input type="text" id="idDelete" name="id" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        CKEDITOR.replace('editer1');
        CKEDITOR.replace('contentEdit');
        // validate form
        var formAdd = $("#formAdd");
        formAdd.validate();
        var formEdit = $("#formEdit");
        formEdit.validate();
        $('#btnAdd').click(function () {
            if (formAdd.valid()) {
                var img = $('#imgAdd').attr('src');
                if (img) {
                    formAdd.submit();
                } else {
                    alert('Bạn cần chọn ảnh cho sản phầm');
                }
            } else {
                alert('Bạn cần điền đầy đủ thông tin');
            }
        })
        $('#btnEdit').click(function () {
            if (formEdit.valid()) {

            } else {

            }
        })
        // end validate form

        function deleteModal(id) {
            $('#idDelete').val(id);
        }
        $("#fileAdd").change(function () {
            readURL(this, 'imgAdd');
        });
        $("#fileEdit").change(function () {
            readURL(this, 'imgEdit');
        });
    });

    function editModal(product) {
        console.log(product)
        // $('#idEdit').val(product.id);
        // $('#nameEdit').val(product.name);
        // $('#priceEdit').val(product.price);
        // $('#catelogEdit').val(product.catalog_id);
        // $('#discountEdit').val(product.discount);
        // $('#imgEdit').attr('src',  './upload/product/' + product.image_link);
        // CKEDITOR.instances['contentEdit'].setData(product.content)
    }
</script>
@endsection