<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>Desarrollo Web</title>
          <?php include "libreriaFormulario.php"; ?>
     </head>
     <body>
         <form action="formulario.php" method="post">
             Primer número: <input type="text" name="numero1" id="numero1">
             <br><br>
             Segundo número: <input type="text" name="numero2" id="numero2">
            <br><br>
             <input type="submit" value="SUMAR" name="botonSuma">
             <input type="submit" value="RESTAR" name="botonResta">
             <input type="submit" value="MULTIPLICAR" name="botonMulti">
             <input type="submit" value="DIVIDIR" name="botonDivi">
         </form>
        <br>
         <?php
            proceso();
         ?>
     </body>
</html>