@extends('admin.layouts.app')

@section('css')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/plugins/table/datatable/dt-global_style.css') }}">
<!-- END PAGE LEVEL CUSTOM STYLES -->

<link href="{{ asset('public/backend/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

{{-- @section('loader')
    @include('admin.layouts.loader')
@endsection --}}

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
            @if(URL::current() == route('admin.web-stories'))
                <h3>Web Story List</h3>
            @elseif(URL::current() == route('admin.deactive-list.web-stories'))
                <h3>Deactive Web Story List</h3>
            @endif
            </div>
        </div>

        <div class="row" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="row">
                    <div class="col-12">
                        @include('admin.layouts.alerts')
                    </div>
                </div>
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>TITLE</th>
                                    <th>AUTHOR</th>
                                    <th>VIEW</th>
                                    <th>IMAGE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($webstories as $item)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>
                                        <a href="{{ route('admin.show.web-story',$item->slug) }}">{{ $item->title }}</a><br>
                                        <small>({{ $item->slug }})</small>
                                    </td>
                                    <td>{{ $item->user->username }}</td>
                                    <td>
                                        <a href="{{ $item->path() }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                        </a>
                                    </td>
                                    <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/app/public/'.$item->image) }}" alt="{{ $item->title }}" style="height: 40px;">
                                    @endif
                                    @if($item->image_link)
                                        <img src="{{ $item->image_link }}" alt="{{ $item->title }}" style="height: 40px;">
                                    @endif
                                    </td>
                                    <td>
                                        @if($item->status == 0)
                                          <span class="badge badge-warning">pending</span>
                                        @elseif($item->status == 1)
                                          <span class="badge badge-info">Active</span>
                                        @elseif($item->status == 2)
                                          <span class="badge badge-danger">deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                    @if(auth()->user()->utype === 5)
                                        <div class="btn-group">
                                            <a href="{{ route('admin.show.web-story',$item->slug) }}" class="btn btn-info btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </a>
                                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                              <a class="dropdown-item" href="{{ route('admin.edit.web-story', $item->id) }}">Edit</a>
                                        @if(URL::current() == route('admin.pending-list.web-stories'))

                                        @else
                                            @if($item->status == 2)
                                              <a class="dropdown-item active-alert" href="{{ route('admin.active.web-story', $item->id) }}">Active</a>
                                            @else
                                              <a class="dropdown-item deactive-alert" href="{{ route('admin.deactive.web-story', $item->id) }}">Deactive</a>
                                            @endif
                                        @endif
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item trash-alert" href="{{ route('admin.soft-delete.web-story', $item->id) }}">Delete</a>
                                            </div>
                                        </div>
                                    @elseif(auth()->user()->utype === 2)
                                        <div class="btn-group">
                                            <a href="{{ route('moderator.show.web-story',$item->slug) }}" class="btn btn-info btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </a>
                                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                            <a class="dropdown-item" href="{{ route('moderator.edit.web-story', $item->id) }}">Edit</a>
                                        @if(URL::current() == route('moderator.pending-list.web-stories'))

                                        @else
                                            @if($item->status == 2)
                                            <a class="dropdown-item active-alert" href="{{ route('moderator.active.web-story', $item->id) }}">Active</a>
                                            @else
                                            <a class="dropdown-item deactive-alert" href="{{ route('moderator.deactive.web-story', $item->id) }}">Deactive</a>
                                            @endif
                                        @endif
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item trash-alert" href="{{ route('moderator.soft-delete.web-story', $item->id) }}">Delete</a>
                                            </div>
                                        </div>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!--  END CONTENT AREA  -->

@endsection

@section('js')

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{ asset('public/backend/plugins/table/datatable/datatables.js') }}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{ asset('public/backend/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<script>
    $('#html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [50, 100, 250, 500],
        "pageLength": 50
    } );

</script>

@include('admin.layouts.sweetalertjs')

@endsection