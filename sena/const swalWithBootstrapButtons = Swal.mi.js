const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
    title: 'Estas seguro?',
    text: "No se podra revertir!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, borralo!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {

        swalWithBootstrapButtons.fire(
        'Borrado!',
        'El registro fue borrado.',
        'success'
        )
    } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
    ) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'No se ha borrado :)',
            'error'
            )
        }
    })

