@extends('admin.layouts.index')
@section('content') 
<div class="wrapper wrapper-full-page">
<div class="full-page login-page" filter-color="black" data-image="../../assets/img/login.jpeg">
    <div class="content">
        <div class="container">
            <div class="row">
            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                <form method="#" action="#">
                    <div class="card card-login">                            
                        <h4 class="card-title text-center">Login</h4>
                        <div class="card-content">    
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">email</i>
                            </span>
                            <div class="form-group label-floating">
                                <label class="control-label">Email address</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                            </span>
                            <div class="form-group label-floating">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="footer text-center">
                        <button type="submit" class="btn btn-rose">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection