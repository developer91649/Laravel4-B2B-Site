@extends('main')
	@section('title')
		Purchasetree.com
	@stop
	@section('styles')
	    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
	    {{HTML::style('//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin')}}
        {{HTML::style('/assets/asset_view/plugins/bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('/assets/asset_view/css/shop.style.css')}}
        {{HTML::style('/assets/asset_view/plugins/animate.css')}}
        {{HTML::style('/assets/asset_view/plugins/line-icons/line-icons.css')}}
        {{HTML::style('/assets/asset_view/plugins/font-awesome/css/font-awesome.min.css')}}
        {{HTML::style('/assets/asset_view/css/pages/page_log_reg_v2.css')}}
        {{HTML::style('/assets/asset_view/css/custom.css')}}
         {{HTML::style('/assets/asset_view/css/app.css')}}
	@stop
	@section('content')
	    <body>
        <!--=== Content Part ===-->
        <div class="container">
            <!--Reg Block-->
            <form method="post" action="{{URL::route('user.auth.doLogin')}}">
                <div class="reg-block">
                    <div class="reg-block-header">
                        <h2>{{Lang::get('user.sign_in')}}</h2>
                        <p>{{Lang::get('user.don_have')}} <a class="color-green" href="{{ URL::route('user.auth.register') }}">{{Lang::get('user.sign_up')}}</a> {{Lang::get('user.to_registration')}}</p>
                    </div>
                    @if ($errors->has())
                        <div class="alert alert-danger alert-dismissibl fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                     <?php if (isset($alert)) { ?>
                        <div class="alert alert-<?php echo $alert['type'];?> alert-dismissibl fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <p>
                                <?php echo $alert['msg'];?>
                            </p>
                        </div>
                    <?php } ?>
                     <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="{{Lang::get('user.user_name_or_email')}}" name="username">
                    </div>
                    <div class="row ">
                        <div class="col-md-12 col-sm-12 text-right">
                            <a href="{{URL::route('user.auth.forgot')}}" class="color-green">{{Lang::get('user.forgot_password')}}</a>
                        </div>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" placeholder="{{Lang::get('user.password')}}" name="password">
                    </div>
                    <div class="input-group" style="float: right">
                        {{ Form::captcha(['id' => 'captcha1']) }}
                    </div>
                    {{--<div class="input-group margin-bottom-20">--}}
                        {{--<span class="input-group-addon"><i class="fa fa-key"></i></span>--}}
                        {{--<input type="text" class="form-control" placeholder="{{Lang::get('user.captcha')}}" name="security">--}}
                    {{--</div>--}}

                     <div class="row ">
                        <div class="col-md-12 margin-bottom-40" style="margin-top: 20px">
                            <button type="submit" class="btn-u btn-block" style="margin-bottom: 20px;">{{Lang::get('user.login')}}</button>
                            <a href="{{URL::route('user.home')}}" class="btn-u btn-block">{{Lang::get('user.go_to_home')}}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--/container-->
        <!--=== End Content Part ===-->
        {{ Captcha::scriptWithCallback(['captcha1']) }}
	@stop
	@section ('scripts')
            {{ HTML::script('/assets/asset_view/plugins/jquery/jquery.min.js') }}
            {{ HTML::script('/assets/asset_view/plugins/jquery/jquery-migrate.min.js') }}
            {{ HTML::script('/assets/asset_view/plugins/bootstrap/js/bootstrap.min.js') }}
            {{ HTML::script('/assets/asset_view/plugins/back-to-top.js') }}
            {{ HTML::script('/assets/asset_view/plugins/backstretch/jquery.backstretch.min.js') }}
            {{ HTML::script('/assets/asset_view/js/custom.js') }}
            {{ HTML::script('/assets/asset_view/js/app.js') }}
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
            <script>
                jQuery(document).ready(function() {
                    App.init();
                 });
                $.backstretch([
                       "/assets/asset_view/img/bg/19.jpg",
                       "/assets/asset_view/img/bg/18.jpg",
                       ], {
                         fade: 1000,
                         duration: 7000
                });
            </script>
    	@stop
@stop