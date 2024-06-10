<!DOCTYPE html>
<html lang="es">
<body style="background-color: #f8f9fa; color: #495057;">

    <div style="max-width: 600px; margin: auto; padding: 20px;">
        <div style="background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h1 style="font-size: 24px; color: #1d4583;">¡Recuperar Contraseña!</h1>
            <p style="font-size: 16px;">Hola, {{ $user->name }}.</p><br>

            <p style="font-size: 16px;">Entendemos que olvidaste tu contraseña. No te preocupes, estamos aquí para ayudarte, si crees que esto es un error puedes ignorar el correo.</p><br>
            
            <p style="font-size: 16px;">Para restablecer tu contraseña, haz clic en el siguiente enlace:</p><br>

            <p style="text-align: center;"> <!-- Agrega text-align: center aquí -->
                <a href="{{ url('reset/' . $user->remember_token) }}" style="display: inline-block; padding: 10px 20px; background-color: #2e843c; color: #ffffff; text-decoration: none; border-radius: 5px;">Restablecer Contraseña</a>
            </p>

            <p style="font-size: 16px; margin-top: 20px;">Si tienes algún problema para recuperar tu contraseña, por favor contáctanos.</p>

            <hr style="border: 1px solid #dee2e6; margin-top: 20px;">

            <p style="font-size: 16px;">
                Gracias,<br>
                <p><strong>CASINO BLACK WIN, Copyright &copy; <?php echo date("Y"); ?>.</p>
            </p>
        </div>
    </div>

</body>
</html>