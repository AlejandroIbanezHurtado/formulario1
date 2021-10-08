<?php
function validarBuenos()
{
    $buenos = array();
    
    //NOMBRE
    if(isset($_POST['nombre']) && $_POST['nombre']!='')
    {   
        if(!is_numeric($_POST['nombre']))
        {
            $buenos['nombre'] = $_POST['nombre'];
        }
    }

    //APELLIDO 1
    if(isset($_POST['ap1']) && $_POST['ap1']!='')
    {
        if(!is_numeric($_POST['ap1']))
        {
            $buenos['ap1']=$_POST['ap1'];
        }
    }

    //APELLIDO2
    if(isset($_POST['ap2']))
    {
        if(!is_numeric($_POST['ap2']))
        {
            $buenos['ap2']=$_POST['ap2'];
        }
    }

    //DNI
    if(isset($_POST['dni']) && $_POST['dni']!='')
    {
        if(dni($_POST['dni'])==true)
        {
            $buenos['dni']=$_POST['dni'];
        }
    }

    //FECHA NAC
    if(isset($_POST['fecha']) && $_POST['fecha']!='')
    {
        if(validarBuenosFecha($_POST['fecha'])==true)
        {
            $buenos['fecha']=$_POST['fecha'];
        }
    }

    //EMAIL
    if(isset($_POST['correo']) && $_POST['correo']!='')
    {
        if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL))
        {
            $buenos['correo']=$_POST['correo'];
        }
    }
    

    //URL WEB
    if(isset($_POST['web']) && $_POST['web']!='')
    {
        if(filter_var($_POST['web'], FILTER_VALIDATE_URL) ==true)
        {
            $buenos['web']=$_POST['web'];
        }
    }
    
    return $buenos;
}

function validarMalos()
{
    $malos = array();
    
    //NOMBRE
    if(isset($_POST['nombre']) && $_POST['nombre']!='')
    {   
        if(is_numeric($_POST['nombre']))
        {
            $malos['nombre'] = "El campo <strong>\"NOMBRE\"</strong> es un número<br>";
        }
    }
    else
    {
        $malos['nombre'] = "El campo <strong>\"NOMBRE\"</strong> está vacío<br>";
    }

    //APELLIDO 1
    if(isset($_POST['ap1']) && $_POST['ap1']!='')
    {
        if(is_numeric($_POST['ap1']))
        {
            $malos['ap1']="El campo <strong>\"PRIMER APELLIDO\"</strong> es un número<br>";
        }
    }
    else
    {
        $malos['ap1'] = "El campo <strong>\"PRIMER APELLIDO\"</strong> está vacío<br>";
    }

    //APELLIDO2
    if(isset($_POST['ap2']))
    {
        if(is_numeric($_POST['ap2']))
        {
            $malos['ap2']="El campo <strong>\"SEGUNDO APELLIDO\"</strong> es un número<br>";
        }
    }

    //DNI
    if(isset($_POST['dni']) && $_POST['dni']!='')
    {
        if(dni($_POST['dni'])==false)
        {
            $malos['dni']="El campo <strong>\"DNI\"</strong> es inválido<br>";
        }
    }
    else
    {
        $malos['dni'] = "El campo <strong>\"DNI\"</strong> está vacío<br>";
    }

    //FECHA NAC
    if(isset($_POST['fecha']) && $_POST['fecha']!='')
    {
        if(validarBuenosFecha($_POST['fecha'])==false)
        {
            $malos['fecha']="El campo <strong>\"FECHA DE NACIMIENTO\"</strong> es inválido<br>";
        }
    }
    else
    {
        $malos['fecha'] = "El campo <strong>\"FECHA DE NACIMIENTO\"</strong> está vacío<br>";
    }

    //EMAIL
    if(isset($_POST['correo']) && $_POST['correo']!='')
    {
        if(!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL))
        {
            $malos['correo']="El campo <strong>\"E-MAIL\"</strong> es inválido<br>";
        }
    }
    else
    {
        $malos['correo'] = "El campo <strong>\"E-MAIL\"</strong> está vacío<br>";
    }
    

    //URL WEB
    if(isset($_POST['web']) && $_POST['web']!='')
    {
        if(!filter_var($_POST['web'], FILTER_VALIDATE_URL) ==true)
        {
            $malos['web']="El campo <strong>\"URL WEB\"</strong> es inválido<br>";
        }
    }
    else
    {
        $malos['web'] = "El campo <strong>\"URL\"</strong> web está vacío<br>";
    }
    
    return $malos;
}

function dni($dni)
{
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    if(!is_numeric($letra))
    {
        if(is_numeric($numeros))
        {
            $valido;
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 )
            {
                $valido=true;
            }
            else
            {
                $valido=false;
            }
        }
        else
        {
            $valido=false;
        }
    }
    else
    {
        $valido=false;
    }
    
    

    return $valido;
}

function validarBuenosFecha($fecha){
	$valores = explode('/', $fecha);
	if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
		return true;
    }
	return false;
}

function pintarFormulario()
{
    if(!isset($_POST['validarBuenos']))
    {
        echo "<form action=\"\" method=\"post\">";
        echo "Nombre: <input name=\"nombre\" value=\"\" >";
        echo "<br><br><br>";
        echo "Primer apellido: <input name=\"ap1\" value=\"\" >";
        echo "<br><br><br>";
        echo "Segundo apellido: <input name=\"ap2\" value=\"\" >";
        echo "<br><br><br>";
        echo "DNI: <input name=\"dni\" value=\"\" >";
        echo "<br><br><br>";
        echo "Fecha de nacimiento: <input name=\"fecha\" value=\"\" >";
        echo "<br><br><br>";
        echo "E-MAIL: <input name=\"correo\" value=\"\" >";
        echo "<br><br><br>";
        echo "URL WEB: <input name=\"web\" value=\"\" >";
        echo "<br><br><br>";
        echo "<input type=\"submit\" value=\"VALIDAR\" name=\"validarBuenos\">";
        echo "<br><br><br>";
        echo "CIUDADES POR VISITAR:";
        echo "<br><br><br>";
        echo "Tokyo: <input type=\"checkbox\" name=\"ciudades[]\" value=\"tokyo\">";
        echo "<br><br>";
        echo "Berlín: <input type=\"checkbox\" name=\"ciudades[]\" value=\"berlin\">";
        echo "<br><br>";
        echo "París: <input type=\"checkbox\" name=\"ciudades[]\" value=\"paris\">";
        echo "<br><br>";
        echo "New York: <input type=\"checkbox\" name=\"ciudades[]\" value=\"ny\">";
        echo "<form>";
    }
    else
    {
        echo "<form action=\"\" method=\"post\">";
        $buenos = validarBuenos();
        $malos = validarMalos();
        //Nombre
        echo "Nombre: <input name=\"nombre\" value=\"";
        if(isset($buenos['nombre']))
        {
            echo $buenos['nombre']."\"";
        }
        else
        {
            echo "\">";
        }
        echo "<br><br><br>";

        //Apellido 1
        echo "Primer apellido: <input name=\"ap1\" value=\"";
        if(isset($buenos['ap1']))
        {
            echo $buenos['ap1']."\"";
        }
        else
        {
            echo "\">";
        }
        echo "<br><br><br>";

        //Apellido 2
        echo "Segundo apellido: <input name=\"ap2\" value=\"";
        if(isset($buenos['ap2']))
        {
            echo $buenos['ap2']."\"";
        }
        else
        {
            echo "\">";
        }
        echo "<br><br><br>";

        //DNI
        echo "DNI: <input name=\"dni\" value=\"";
        if(isset($buenos['dni']))
        {
            echo $buenos['dni']."\"";
        }
        else
        {
            echo "\">";
        }
        echo "<br><br><br>";

        //FECHA NAC
        echo "Fecha de nacimiento: <input name=\"fecha\" value=\"";
        if(isset($buenos['fecha']))
        {
            echo $buenos['fecha']."\"";
        }
        else
        {
            echo "\">";
        }
        echo "<br><br><br>";

        //CORREO
        echo "E-MAIL: <input name=\"correo\" value=\"";
        if(isset($buenos['correo']))
        {
            echo $buenos['correo']."\"";
        }
        else
        {
            echo "\">";
        }
        echo "<br><br><br>";
        
        //URL
        echo "URL WEB: <input name=\"web\" value=\"";
        if(isset($buenos['web']))
        {
            echo $buenos['web']."\"";
        }
        else
        {
            echo "\">";
        }
        echo "<br><br><br>";
        //CHECKBOX

        //BOTON
        echo "<input type=\"submit\" value=\"VALIDAR\" name=\"validarBuenos\">";
        echo "<br><br><br>";
        echo "CIUDADES POR VISITAR:";
        echo "<br><br><br>";
        echo "Tokyo: <input type=\"checkbox\" name=\"ciudades[]\" value=\"tokyo\"";
        if(isset($_POST['ciudades']) && in_array("tokyo",$_POST['ciudades']))
        {
            echo "checked=\"checked\"";
        }
        echo"/>";
        echo "<br><br>";
        echo "Berlín: <input type=\"checkbox\" name=\"ciudades[]\" value=\"berlin\"";
        if(isset($_POST['ciudades']) && in_array("berlin",$_POST['ciudades']))
        {
            echo "checked=\"checked\"";
        }
        echo"/>";
        echo "<br><br>";
        echo "París: <input type=\"checkbox\" name=\"ciudades[]\" value=\"paris\"";
        if(isset($_POST['ciudades']) && in_array("paris",$_POST['ciudades']))
        {
            echo "checked=\"checked\"";
        }
        echo"/>";
        echo "<br><br>";
        echo "New York: <input type=\"checkbox\" name=\"ciudades[]\" value=\"ny\"";
        if(isset($_POST['ciudades']) && in_array("ny",$_POST['ciudades']))
        {
            echo "checked=\"checked\"";
        }
        echo"/>";
        echo "</form>";

        $numError = count($malos);
        $texto ="";

        if($numError>0)
        {
            foreach($malos as &$valor)
            {
                $texto=$texto.$valor;
                echo "<div id=\"texto\">$texto</div>";
                echo "<style type=\"text/css\">#texto{position: absolute; left: 500px; bottom: 500px; background-color: #ff9999; border-radius: 5px; border: red 5px solid;}</style>";
            }
        }
        
        
    }
    
    
}

function pintor($dato)
{
    echo $dato;
}

