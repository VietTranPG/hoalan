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
                            <td>
                                <div class="img-container">
                                    <img src="../../assets/img/product1.jpg" alt="...">
                                </div>
                            </td>
                            <td class="td-name">
                                <a href="#jacket">Spring Jacket</a>
                                <br />
                                <small>by Dolce&Gabbana</small>
                            </td>                          
                            <td class="td-number text-right">
                                <small>&euro;</small>549
                            </td>
                            <td class="td-number">
                                1
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
                                <small>&euro;</small>549
                            </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="img-container">
                                    <img src="../../assets/img/product2.jpg" alt="..." />
                                </div>
                            </td>
                            <td class="td-name">
                                <a href="#pants">Short Pants</a>
                                <br />
                                <small>by Pucci</small>
                            </td>
                            <td>
                                Purple
                            </td>
                            <td>
                                M
                            </td>
                            <td class="td-number">
                                <small>&euro;</small>499
                            </td>
                            <td class="td-number">
                                2
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
                                <small>&euro;</small>998
                            </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="img-container">
                                    <img src="../../assets/img/product3.jpg" alt="...">
                                </div>
                            </td>
                            <td class="td-name">
                                <a href="#nothing">Pencil Skirt</a>
                                <br />
                                <small>by Valentino</small>
                            </td>
                            <td>
                                White
                            </td>
                            <td>
                                XL
                            </td>
                            <td class="td-number">
                                <small>&euro;</small>799
                            </td>
                            <td class="td-number">
                                1
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
                                <small>&euro;</small>799
                            </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="td-total">
                                Tổng
                            </td>
                            <td colspan="1" class="td-price">
                                <small>&euro;</small>2,346
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td colspan="2" class="text-right">
                                <button type="button" class="btn btn-info btn-round">Complete Purchase
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
@endsection