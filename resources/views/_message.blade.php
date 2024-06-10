@if(!empty(session('error'))) 
    <!-- Mensaje de error -->
    <div class="alert alert-danger" role="alert">
        {{ session('error')}} 
    </div> 
@endif

@if(!empty(session('success'))) 
    <!-- Mensaje de éxito -->
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div> 
@endif

@if ($errors->any())
    <!-- Mensajes de error generales -->
    <div class="alert alert-warning" role="alert">
        {{ $errors->first() }}
    </div>
@endif

@if(!empty(session('payment-error'))) 
    <!-- Mensaje de error de pago-->
    <div class="alert alert-danger" role="alert">
        {{ session('payment-error') }} 
    </div> 
@endif

@if(session('warning'))
    <!-- Mensaje de advertencia -->
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if(session('info'))
    <!-- Mensaje informativo -->
    <div class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endif

@if(session('primary'))
    <!-- Mensaje de estilo primary -->
    <div class="alert alert-primary" role="alert">
        {{ session('primary') }}
    </div>
@endif

@if(session('secondary'))
    <!-- Mensaje de estilo secondary -->
    <div class="alert alert-secondary" role="alert">
        {{ session('secondary') }}
    </div>
@endif

@if(session('light'))
    <!-- Mensaje de estilo light -->
    <div class="alert alert-light" role="alert">
        {{ session('light') }}
    </div>
@endif

@if(session('welcomeMessage'))

  <div id="welcomeAlert" class="text-center d-flex align-items-center">
    <div class="alert alert-success text-white mx-auto w-75 w-md-50 w-lg-25 my-3" style="z-index: 9999;">
      <span class="ml-3">{{ session('welcomeMessage') }}</span>
      <button type="button" class="close px-3" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

{{-- Borrar el mensaje de bienvenida después de 5 segundos --}}
<script>
    setTimeout(function() {
        $('#welcomeAlert').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 3000);
</script>
@endif

@if(session('errorMessage'))

  <div id="errorMessage" class="text-center d-flex align-items-center">
    <div class="alert alert-danger text-white mx-auto w-75 w-md-50 w-lg-25 my-3" style="z-index: 9999;">
      <span class="ml-3">{{ session('errorMessage') }}</span>
      <button type="button" class="close px-3" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

{{-- Borrar el mensaje de bienvenida después de 5 segundos --}}
<script>
    setTimeout(function() {
        $('#errorMessage').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 3000);
</script>
@endif