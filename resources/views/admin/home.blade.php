@extends('admin.layouts.layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @foreach(\App\Helpers\DashboardHelper::boxWidgets() as $boxWidget)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-{{$boxWidget['color']}}">
                            <div class="inner">
                                <h3>{{$boxWidget['count']}}</h3>

                                <p>{{$boxWidget['title']}}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-{{$boxWidget['icon']}}"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection