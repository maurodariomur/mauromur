document.addEventListener('DOMContentLoaded', function() {
    var successMessage = document.getElementById('success-message');
  
    if (successMessage) {
      successMessage.classList.add('show');
  
      setTimeout(function() {
        successMessage.classList.remove('show');
      }, 3000); // 3000 milisegundos = 3 segundos
    }
  });

      $(document).ready(function() {
          var cartCountElement = $('#cart_count');
          var currentCount = parseInt(cartCountElement.text());
  
          // Actualizar el número de productos en el carrito después de agregar un producto
          $('.btnAgregar').click(function() {
              currentCount++;
              cartCountElement.text(currentCount);
          });
  
          // Actualizar el número de productos en el carrito después de eliminar un producto
          $('.btnEliminar').click(function() {
              currentCount--;
              cartCountElement.text(currentCount);
          });
      });