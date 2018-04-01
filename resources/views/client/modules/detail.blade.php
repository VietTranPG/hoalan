@extends('client.layouts.main') @section('page')
<div class="wrapper">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="product-page1">
                            <img class="img-detail" src="./../upload/product/{{$product->image_link}}">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <a href="#">
                            <h3 class="title">{{$product->name}}</h3>
                        </a>
                        <p class="description">
                            {{$product->category_name}}
                        </p>

                        <span class="price"> {{$product->price}}</span>
                        <p>
                            <button type="button" class="btn  btn-success">Thêm vào giỏ hàng</button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h3 class="panel-title">
                        Mô tả
                    </h3>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        {!!$product->content!!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <div class="actions">
                        <div class="pull-right">
                            <button class="btn btn-danger btn-simple btn-hover" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                                <i class="fa fa-heart-o"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section ">
        <div class="container container-border">
            <div class="title">
                <h4>Sản Phẩm cùng loại</h4>
            </div>
            <div class="row">
                @foreach($sameCategory as $item)
                <div class="col-md-4">
                    <div class="card card-product card-plain">
                        <div class="image">
                            <a href="#">
                                <img class="img-detail" src="./../upload/product/{{$item->image_link}}">
                            </a>
                        </div>
                        <div class="content">
                            <a href="#">
                                <h4 class="title">{{$item->name}}</h4>
                            </a>
                            <p class="description">
                                {{$item->category_name}}
                            </p>
                            <div class="footer">
                                <span class="price"> {{$item->price}} đ</span>
                                <button class="btn btn-danger btn-simple btn-hover">
                                    Thêm vào giỏ
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection