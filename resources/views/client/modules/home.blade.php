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
        <a class="btn btn-rose btn-round cart" id="{{$item->id}}">Thêm vào giỏ</a>
        </div>
    </div>
</div>
@endforeach
<script>
    function goto(id) {
        window.location.href = '/detail/' + id;
    }
</script>
@endsection