function swal() {
    Swal.fire({
        title: 'Are you sure?',
        text: "This user will be deleted permanently. You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-outline-primary ms-1'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            // form.submit();
            Swal.fire({
                icon: 'info',
                title: 'Deletion in Progress!',
                text: 'This user will be deleted.',
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            })
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: 'Cancelled',
                text: 'User is safe :)',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            })
        }
    })
};