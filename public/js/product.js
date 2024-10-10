destroy = function(e) { 
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');
    
    Swal.fire({ 
        icon: 'question',
        title: '¿Desea continuar?', 
        text: 'El usuario será eliminado', 
        showCancelButton: true, 
        cancelButtonText: 'Cancelar', 
        confirmButtonText: 'Sí'
    }).then((res) => { 
        if (res.isConfirmed) { 
            const request = new XMLHttpRequest();
            request.open('DELETE', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);

            request.onload = () => { 
                if (request.status === 200) { 
                    e.closest('tr').remove();
                    Swal.fire({ 
                        icon: 'success', 
                        text: 'Usuario eliminado correctamente'
                    });
                } else {
                    // Maneja el error si no es exitoso
                    Swal.fire({
                        icon: 'error',
                        text: 'Error al eliminar el usuario. Verifique e intente nuevamente.'
                    });
                }
            };

            request.onerror = err => {
                Swal.fire({
                    icon: 'error',
                    text: 'Error de conexión. Por favor, intente más tarde.'
                });
                console.error('Error al eliminar:', err);
            };

            request.send(); 
        }
    });
}
