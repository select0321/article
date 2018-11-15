@extends('layouts.app')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">


                    @foreach($list as $item)


                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h3><a href="{{$item->content_url}}" target="_blank">{{$item->title}}</a></h3>
                                <div class="text-muted">
                                    {{$item->article->digest}}
                                </div>
                                <div class="d-flex align-items-center pt-5 mt-auto">


                                    <div class="avatar avatar-md mr-3"
                                         style="background-image: url({{$item->feed->cover}})"></div>
                                    <div>
                                        <a href="./profile.html" class="text-default">{{$item->creator}}</a>
                                        <small class="d-block text-muted">{{$item->published_at}}</small>
                                    </div>
                                    <div class="ml-auto text-muted">
                                        <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i
                                                    class="fe fe-heart mr-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="ext-center ml-auto">

                        {{$list->links()}}

                    </div>


                </div>


                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-header">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Message">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary">
                                        <i class="fe fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="media">
                                <span class="avatar avatar-xxl mr-5"
                                      style="background-image: url(http://wx.qlogo.cn/mmhead/Q3auHgzwzM7y5qQSdicmVzpBia0v6ZQQhk1KGF7eX9BqzV3ufRfUKs0g/0)"></span>
                                <div class="media-body">
                                    <h4 class="m-0">58沈剑 架构师之路</h4>
                                    <p class="text-muted mb-0">微信有很多群，现进行如下抽象：</p>
                                    <ul class="social-links list-inline mb-0 mt-2">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip"
                                               data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip"
                                               data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip"
                                               data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip"
                                               data-original-title="@skypename"><i class="fa fa-skype"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>

@endsection
