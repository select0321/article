
@foreach(config('hwbase.tool') as $tool)

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$tool['title']}}</h3>

        </div>
        <div class="card-body btn-list">

            @foreach($tool['data'] as $v)
{{--                    <a target="_blank" href="{{$v[1]}}" class="btn btn-sm {{array_random(config('hwbase.btn_color'))}}">{{$v[0]}}</a>--}}
                    <a target="_blank" href="{{$v[1]}}" class="btn btn-sm btn-outline-info">{{$v[0]}}</a>

            @endforeach

        </div>
    </div>
@endforeach