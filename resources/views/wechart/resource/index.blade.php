@extends('layouts.app')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">

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
                            <ul class="list-group card-list-group">

                                @foreach($list as $item)
                                    <li class="list-group-item py-5">

                                        <h4><a href="{{url('resource/' . $item->id)}}" class="text-info">{{$item->title}}</a></h4>
                                        <div class="text-muted">{{$item->article->digest}}</div>

                                        <div class="d-flex align-items-center pt-2 mt-auto">

                                            <div>
                                                <a href="http://www.hw798.com/news?category=1&amp;feed_id=67" class="text-default">{{$item->feed->name}} • {{$item->creator}}</a>
                                                <small class="d-block text-muted">{{$item->published_at}}</small>
                                            </div>
                                            <div class="ml-auto text-muted">

                                                <span class="tag">{{$item->feed->name}}</span>
                                                <span class="tag">{{$item->creator}}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    {{$list->links()}}

                    </div>


                </div>


                <div class="col-lg-3">




                </div>


            </div>
        </div>
    </div>

@endsection
