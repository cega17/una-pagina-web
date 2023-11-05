// Obtener elementos del DOM
const comentarioInput = document.getElementById('comentario');
const enviarComentarioBtn = document.getElementById('enviar-comentario');
const comentariosDiv = document.getElementById('comentarios');

// Manejador de eventos para enviar comentarios
enviarComentarioBtn.addEventListener('click', () => {
    const comentario = comentarioInput.value;
    if (comentario.trim() !== '') {
        // Crear un nuevo elemento para mostrar el comentario
        const nuevoComentario = document.createElement('p');
        nuevoComentario.textContent = comentario;
        
        // Agregar el comentario al contenedor de comentarios
        comentariosDiv.appendChild(nuevoComentario);

        // Limpiar el campo de entrada
        comentarioInput.value = '';
    }
});
