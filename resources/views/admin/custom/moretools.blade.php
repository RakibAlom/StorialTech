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
                <h3>More Tools Site</h3>
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
                    <div class="text-center">
                        <button class="btn btn-warning box-shadow" data-toggle="modal" data-target="#newTool">New Tool Site</button>
                    </div>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>NAME</th>
                                    <th>TITLE</th>
                                    <th>SITE LINK</th>
                                    <th>DETAILS</th>
                                    <th>SNUMBER</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($toolsite as $item)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->tool_name }}</td>
                                    <td>{{ $item->tool_title }}</td>
                                    <td><a href="{{ $item->website_links }}" target="_blank">{{ $item->website_links }}</a></td>
                                    <td>{{ $item->tool_details }}</td>
                                    <td>{{ $item->serial }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                              <a class="dropdown-item trash-alert" href="{{ route('admin.tools.delete', $item->id) }}">Delete</a>
                                            </div>
                                        </div>
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

<!-- Modal -->
<div class="modal fade" id="newTool" tabindex="-1" aria-labelledby="newTool" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded-0">
      <div class="modal-content rounded-0">
        <div class="modal-header rounded-0">
          <h5 class="modal-title" id="exampleModalLabel">New Tool Site Link</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body rounded-0">
            <form id="contact" class="section contact" action="{{ route('admin.tools.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tool_name">TOOL SITE NAME</label>
                    <input type="text" class="form-control mb-4 @error('tool_name') is-invalid @enderror" name="tool_name" id="tool_name" placeholder="ex: site name" id="tool_name" value="{{ old('tool_name') }}" required>
                    @error('tool_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tool_title">TOOL SITE TITLE</label>
                    <input type="text" class="form-control mb-4 @error('tool_title') is-invalid @enderror" name="tool_title" id="tool_title" placeholder="ex: site title" id="tool_title" value="{{ old('tool_title') }}" required>
                    @error('tool_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="website_links">WEBSITE LINKS</label>
                    <input type="text" class="form-control mb-4 @error('website_links') is-invalid @enderror" name="website_links" id="website_links" placeholder="ex: http:// or https://" id="website_links" value="{{ old('website_links') }}" required>
                    @error('website_links')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tool_icon">TOOLS FONT ICON</label>
                    <input type="text" class="form-control mb-4 @error('tool_icon') is-invalid @enderror" name="tool_icon" id="tool_icon" placeholder="ex: fa-external-link" id="tool_icon" value="{{ old('tool_icon') }}" required>
                    @error('tool_icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tool_details">TOOLS DETAILS</label>
                    <textarea class="form-control mb-4 @error('tool_details') is-invalid @enderror" name="tool_details" id="tool_details" placeholder="note your tool details..." rows="4" id="tool_details" value="{{ old('tool_details') }}"></textarea>
                    @error('tool_details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-lg btn-block font-weight-bold">PUBLISH TOOL SITE</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>


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
