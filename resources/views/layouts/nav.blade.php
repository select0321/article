<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">


            <div class="col-lg-2 ml-auto">
                <form class="input-icon my-3 my-lg-0" action="{{url('/goto')}}" method="get" target="_blank">
                    <input type="search" class="form-control header-search" placeholder="Google 无需翻墙" name="q" id="q" tabindex="1">
                    <input name="url" type="hidden" value="http://google.hw798.com/search">

                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>

            <div class="col-lg-2 ml-auto">
                <form class="input-icon my-3 my-lg-0" action="{{url('/goto')}}" method="get"
                      target="_blank">
                    <input type="search" class="form-control header-search" placeholder="百度" name="word" id="word"
                           tabindex="1">
                    <input name="url" type="hidden" value="https://www.baidu.com/baidu">

                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>



            <div class="col-lg-2 ml-auto">
                <form class="input-icon my-3 my-lg-0" action="{{url('/goto')}}" method="get" target="_blank">
                    <input type="search" class="form-control header-search" placeholder="github" name="q" id="q" tabindex="1">
                    <input name="url" type="hidden" value="https://github.com/search">
                    <input name="o" type="hidden" value="desc">
                    <input name="s" type="hidden" value="stars">
                    <input name="type" type="hidden" value="Repositories">

                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>

            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

                    <li class="nav-item"><a class="nav-link{{@$_GET['category'] ? '' : ' active'}}" href="{{url('/')}}"><i class="fe fe-home"></i>
                            首页</a></li>
                    <li class="nav-item"><a class="nav-link{{@$_GET['category'] == 1 ? ' active' : ''}}" href="{{url('/news?category=1&e_time=' . date('Y-m-d H:i:s', strtotime('-1 day')))}}"><i class="fe fe-list"></i>
                            技术小读</a></li>
                    <li class="nav-item"><a class="nav-link{{@$_GET['category'] == 2 ? ' active' : ''}}" href="{{url('/news?category=2&e_time=' . date('Y-m-d H:i:s', strtotime('-1 day')))}}"><i class="fe fe-file"></i>
                            科技小读</a></li>

                    <li class="nav-item"><a class="nav-link" href="https://github.com/sindresorhus/awesome"><i
                                    class="fe fe-file-text" target="_blank"></i> 资料大全</a></li>


                    <li class="nav-item"><a class="nav-link" href="https://segmentfault.com/events"><i
                                    class="fe fe-calendar"></i> 技术大会</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

