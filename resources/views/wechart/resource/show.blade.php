@extends('layouts.app')

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    Documentation
                </h1>
            </div>
            <div class="row">
                <div class="col-lg-3 order-lg-1 mb-4">


                    <a href="https://github.com/tabler/tabler" class="btn btn-block btn-primary mb-6">
                        <i class="fe fe-github mr-2"></i>Browse source code
                    </a>
                    <!-- Getting started -->
                    <div class="list-group list-group-transparent mb-0">
                        <a href="../docs/index.html" class="list-group-item list-group-item-action active"><span class="icon mr-3"><i class="fe fe-flag"></i></span>Introduction</a>
                    </div>
                    <!-- Components -->
                    <div class="list-group list-group-transparent mb-0">
                        <a href="../docs/alerts.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-alert-triangle"></i></span>Alerts</a>
                        <a href="../docs/avatars.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-user"></i></span>Avatars</a>
                        <a href="../docs/buttons.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-plus-square"></i></span>Buttons</a>
                        <a href="../docs/colors.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-feather"></i></span>Colors</a>
                        <a href="../docs/cards.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-image"></i></span>Cards</a>
                        <a href="../docs/charts.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-pie-chart"></i></span>Charts</a>
                        <a href="../docs/form-components.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-check-square"></i></span>Form components</a>
                        <a href="../docs/tags.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-tag"></i></span>Tags</a>
                        <a href="../docs/typography.html" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-type"></i></span>Typography</a>
                    </div>
                    <div class="d-none d-lg-block mt-6">
                        <a href="https://github.com/tabler/tabler/edit/dev/src/_docs/index.md" class="text-muted">Edit this page</a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-wrap p-lg-6">
                                <h2 class="mt-0 mb-4">{{$item->title}}</h2>
                                 <?php echo $item->article->content?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
