@extends('client.layouts.main') @section('page') @foreach($product as $key=>$item)
<div class="col-xs-6 col-md-3">
    <div class="card card-pricing card-raised">
        <div class="content">
            <div onclick="goto({{$item->id}})">
                <h6 class="category">{{$item->name}}</h6>
                <img class="img-product" src="./upload/product/{{$item->image_link}}" />
                <h3 class="card-title"> {{$item->price}} đ</h3>
                <p class="card-description">
                    {{$item->category_name}}
                </p>
            </div>
            <a class="btn btn-rose btn-round cart" id="{{$item->id}}" name="{{$item->name}}" img="{{$item->image_link}}" price="{{$item->price}}"
                discount="{{$item->discount}}" category="{{$item->category_name}}">Thêm vào giỏ</a>
        </div>
    </div>
</div>
@endforeach
<script>
    function goto(id) {
        window.location.href = '/detail/' + id;
    }
</script>
<img src="upload/product/aytpye15239898885.jpg" alt="Smiley face" height="500" width="500">
<form class="form-horizontal" action="test" method="post" enctype="multipart/form-data">
<div class="form-group">
    <div class="col-md-9">
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Choose img
                    <input type="file" name="image" id="imgInp">
                </span>
            </span>

        </div>
    </div>
</div>
<button type="submit">Send</button>
</form>
@endsection