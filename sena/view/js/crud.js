function erase(obj){
    
    oculto.value = obj.children[0].innerHTML;

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confireButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Estas seguro?',
        text: 'no podras revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confireButtonText: 'si, borralo!',
        cancelButtonText: 'No, cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfired) {
            window.location="index.php?ruta=erase&codigo="+codigo;
        }else if (
            /*read more about hadling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'tu archivo no fue borrado :)',
                'error'
            )
        }
    })

}