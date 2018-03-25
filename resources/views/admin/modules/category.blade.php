@extends('admin.layouts.main')
@section('page')
<div class="col-md-12">
   <div class="card">
      <div class="card-header card-header-icon" data-background-color="rose">
         <i class="material-icons">assignment</i>
      </div>
      <div class="card-content ">
         <div class="card-title clearfix">
            <h4 class="pull-left">Danh sách danh mục</h4>
            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAdd">
            Add new
            </button>
         </div>
         <div class="table-responsive ">
            <table class="table">
               <thead>
                  <tr>
                     <th class="text-center">#</th>
                     <th>Danh mục</th>
                     <th>Số lượng sản phẩm</th>
                     <th class="text-right">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($category as $key=>$item)
                  <tr>
                     <td class="text-center">{{++$key}}</td>
                     <td id="name_{{$item->id}}">{{$item->name}}</td>
                     <td>0</td>
                     <td class="td-actions text-right">
                        <button type="button" rel="tooltip" id="btnEdit" onclick="editModal({{$item->id}})" class="btn btn-success">
                        <i class="material-icons"  data-toggle="modal" data-target="#modalEdit">edit</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-danger" onclick="deleteModal({{$item->id}})">
                        <i class="material-icons"  data-toggle="modal" data-target="#modalDelete">close</i>
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
   <form action="category/add" method="POST">
      <div class="modal-dialog modal-sm">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Thêm Thể Loại</h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="exampleInputEmail1">Tên thể loại</label>
                  <input type="text" name="name" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success">Thêm</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </form>
</div>
<!-- Modal Edit-->
<div id="modalEdit" class="modal fade" role="dialog">
   <form action="category/update" method="POST">
      <div class="modal-dialog modal-sm">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Sửa Thể Loại</h4>
            </div>
            <div class="modal-body">
               <div class="form-group" hidden>
                  <label for="exampleInputEmail1">id</label>
                  <input type="text" id="idEdit" name="id" class="form-control">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Tên thể loại</label>
                  <input type="text" id="nameEdit" name="name" class="form-control">
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
            <form action="category/delete" method="POST">
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
   function editModal(id){
       var name = $('#name_'+id).html();
       $('#idEdit').val(id);
       $('#nameEdit').val(name);
   }    
   function deleteModal(id){              
       $('#idDelete').val(id);
   } 
</script>
@endsection