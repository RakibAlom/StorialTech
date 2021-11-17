
<script src="{{ asset('public/backend/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script>
  $('.approve-alert').on('click', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    const swalWithBootstrapButtons = swal.mixin({
      confirmButtonClass: 'btn btn-success btn-rounded',
      cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
      buttonsStyling: false,
    })

    swalWithBootstrapButtons({
      title: 'Are you sure?',
      text: "You want to Approve!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Approve!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true,
      padding: '2em'
    }).then(function(result) {
      if (result.value) {
      window.location.href = link;
        swalWithBootstrapButtons(
          'Approved!',
          'data has been approved.',
          'success'
        )
      } else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons(
          'Cancelled',
          'data has been not approved! :)',
          'error'
        )
      }
    })
  });

  $('.active-alert').on('click', function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  const swalWithBootstrapButtons = swal.mixin({
    confirmButtonClass: 'btn btn-success btn-rounded',
    cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
    buttonsStyling: false,
  })

  swalWithBootstrapButtons({
    title: 'Are you sure?',
    text: "You want to active!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Active!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
    window.location.href = link;
      swalWithBootstrapButtons(
        'Active!',
        'data has been actived.',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons(
        'Cancelled',
        'data has been deactive :)',
        'error'
      )
    }
  })
});

$('.deactive-alert').on('click', function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  const swalWithBootstrapButtons = swal.mixin({
    confirmButtonClass: 'btn btn-success btn-rounded',
    cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
    buttonsStyling: false,
  })

  swalWithBootstrapButtons({
    title: 'Are you sure?',
    text: "You want to deactive!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Deactive!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
    window.location.href = link;
      swalWithBootstrapButtons(
        'Deactive!',
        'data has been deactive!',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons(
        'Cancelled',
        'data has been active :)',
        'error'
      )
    }
  })
});

$('.block-alert').on('click', function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  const swalWithBootstrapButtons = swal.mixin({
    confirmButtonClass: 'btn btn-success btn-rounded',
    cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
    buttonsStyling: false,
  })

  swalWithBootstrapButtons({
    title: 'Are you sure?',
    text: "You want to block data!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Block!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
    window.location.href = link;
      swalWithBootstrapButtons(
        'Blocked!',
        'data has been Blocked.',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons(
        'Cancelled',
        'data has been safe :)',
        'error'
      )
    }
  })
});

$('.unblock-alert').on('click', function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  const swalWithBootstrapButtons = swal.mixin({
    confirmButtonClass: 'btn btn-success btn-rounded',
    cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
    buttonsStyling: false,
  })

  swalWithBootstrapButtons({
    title: 'Are you sure?',
    text: "You want to unblock data!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Unblock!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
    window.location.href = link;
      swalWithBootstrapButtons(
        'Unblock!',
        'data has been unblock!',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons(
        'Cancelled',
        'data has been blocked :)',
        'error'
      )
    }
  })
});

$('.trash-alert').on('click', function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  const swalWithBootstrapButtons = swal.mixin({
    confirmButtonClass: 'btn btn-success btn-rounded',
    cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
    buttonsStyling: false,
  })

  swalWithBootstrapButtons({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
    window.location.href = link;
      swalWithBootstrapButtons(
        'Deleted!',
        'data has been deleted.',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons(
        'Cancelled',
        'data has been safe :)',
        'error'
      )
    }
  })
});

$('.delete-alert').on('click', function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  const swalWithBootstrapButtons = swal.mixin({
    confirmButtonClass: 'btn btn-success btn-rounded',
    cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
    buttonsStyling: false,
  })

  swalWithBootstrapButtons({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
    window.location.href = link;
      swalWithBootstrapButtons(
        'Deleted!',
        'data has been permanently deleted.',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons(
        'Cancelled',
        'data has been safe :)',
        'error'
      )
    }
  })
});
</script>
