@extends('admin.layouts.app')

@section('css')

@endsection


@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Web Story Grid View</h3>
            </div>
        </div>

        <div class="row" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="row">
                    <div class="col-12">
                        @include('admin.layouts.alerts')
                    </div>
                </div>
                <div class="widget-content widget-content-area br-6">
                    <div class="row">
                    @foreach ($webstories as $item)
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            {!! $item->embed_code !!}
                        </div>
                    @endforeach
                    </div>
                    
                    <div class="mt-4">
                        {{  $webstories->links('vendor.pagination.custom') }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<!--  END CONTENT AREA  -->

@endsection

@section('js')

@endsection
