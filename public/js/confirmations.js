document.addEventListener('submit',(e)=>{

    // formulario de agregar productos 
    if(e.target.matches('#formAddProduct')){
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Se agregara un producto nuevo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#17A589',
            cancelButtonColor: '#5D6D7E',
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                //limpiar precio para que llegue sin simbolos
                e.target.precio.value = cleanNumber(e.target.precio.value);
                //enviar form
                e.target.submit();
            }
        })
    }

    // formulario eliminar producto
    if(e.target.matches('#formDestroyProduct')){
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Se eliminara el producto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#17A589',
            cancelButtonColor: '#5D6D7E',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        })
    }

});
