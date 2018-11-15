@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="page-header">
            <h1 class="page-title">
                公众号导航
            </h1>
            {{--<div class="page-subtitle">1 - 12 of 1713 photos</div>--}}
            <div class="page-options d-flex">
                <form action="https://weixin.sogou.com/weixin" method="get" target="_blank">

                    <div class="input-icon ml-2">
                  <span class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </span>
                        <input type="text" name="query" class="form-control w-10" value="" placeholder="搜索公众号">
                    </div>
                </form>
            </div>
        </div>


        <div class="row row-cards row-deck">
            @for($yy=0; $yy<30; $yy++)

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">架构师</h3>
                        </div>
                        <div class="card-body o-auto" style="height: 25rem">
                            <ul class="list-unstyled list-separated">

                                @for($yyy=0; $yyy<30; $yyy++)

                                    <li class="list-separated-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            <span class="avatar avatar-md d-block"
                                                  style="background-image: url(http://wx.qlogo.cn/mmhead/Q3auHgzwzM7y5qQSdicmVzpBia0v6ZQQhk1KGF7eX9BqzV3ufRfUKs0g/0)"></span>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <a href="javascript:void(0)" class="text-inherit">架构师之路</a>
                                                </div>
                                                <small class="d-block item-except text-sm text-muted h-1x">
                                                    架构师之路，坚持撰写接地气的架构文章
                                                </small>
                                            </div>
                                            <div class="col-auto">
                                                <div class="item-action dropdown">
                                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                                                class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endfor

                            </ul>
                        </div>
                    </div>
                </div>

            @endfor
        </div>
    </div>


@endsection

{{----}}
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--@for($y=0; $y<4; $y++)--}}

{{--<div class="container">--}}
{{--<div class="page-header">--}}
{{--<h1 class="page-title">--}}
{{--前端--}}
{{--</h1>--}}
{{--<div class="page-subtitle">25个</div>--}}
{{--<div class="page-options d-flex">--}}

{{--<div class="input-icon ml-2">--}}
{{--<span class="input-icon-addon">--}}
{{--<i class="fe fe-search"></i>--}}
{{--</span>--}}
{{--<input type="text" class="form-control w-10" placeholder="搜索公众号">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="row row-cards">--}}

{{--@for($i=0; $i<16; $i++)--}}
{{--<div class="col-sm-6 col-lg-3">--}}
{{--<div class="card p-3">--}}
{{--<div class="d-flex align-items-center">--}}
{{--<span class="stamp stamp-md bg-blue mr-3">--}}
{{--<i class="fe fe-dollar-sign"></i>--}}
{{--</span>--}}
{{--<div>--}}
{{--<h4 class="m-0"><a href="javascript:void(0)">132--}}
{{--<small>Sales</small>--}}
{{--</a></h4>--}}
{{--<small class="text-muted">12 waiting payments</small>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endfor--}}


{{--</div>--}}
{{--@endfor--}}

{{--@endsection--}}
