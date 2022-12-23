$(function () {
  'use strict'
   var confirmColor = $('#destroy');


  var assetPath = '../../../app-assets/'
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path')
  }

  // Confirm Color
   if (confirmColor.length) {
      confirmColor.on('submit', function (e) {
         let form = this;
         e.preventDefault();
         Swal.fire({
            title: 'Are you sure?',
            text: "Application and files associated with this application will be removed permanently. You won't be able" +
               " to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
               confirmButton: 'btn btn-danger',
               cancelButton: 'btn btn-outline-primary ms-1'
            },
            buttonsStyling: false
         }).then(function (result) {
            if (result.value) {form.submit();
               Swal.fire({
                  icon: 'info',
                  title: 'Deletion in Progress!',
                  text: 'Your application will be deleted.',
                  customClass: {
                     confirmButton: 'btn btn-success'
                  }
               })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
               Swal.fire({
                  title: 'Cancelled',
                  text: 'Your application is safe :)',
                  icon: 'error',
                  customClass: {
                     confirmButton: 'btn btn-success'
                  }
               })
            }
         })
      })
   }

})
