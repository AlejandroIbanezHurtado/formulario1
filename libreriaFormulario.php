<?php
function validar()
{
    $errores = array();
    
    if(isset($_POST['numero1']) && $_POST['numero1']!='')
    {   
        if(!is_numeric($_POST['numero1']))
        {
            $errores['numero1'] = 'En primer número no hay un número<br>';
        }
    }
    else
    {
        $errores['numero1'] = 'Primer número no existe<br>';
    }

    if(isset($_POST['numero2']) && $_POST['numero2']!='')
    {
        if(!is_numeric($_POST['numero2']))
        {
            $errores['numero2']='En segundo número no hay un número<br>';
        }
    }
    else
    {
        $errores['numero2'] = 'Segundo número no existe<br>';
    }
    
    return $errores;
}
function saberBoton()
{
    $nombre="";
    if(isset($_POST['botonSuma']))
    {
        $nombre="botonSuma";
    }
    else
    {
        if(isset($_POST['botonResta']))
        {
            $nombre="botonResta";
        }
        else
        {
            if(isset($_POST['botonMulti']))
            {
                $nombre="botonMulti";
            }
            else
            {
                $nombre ="botonDivi";
            }
        }
    }

    return $nombre;
}
function saberFuncionDeBoton()
{
    $nombre="";
    if(isset($_POST['botonSuma']))
    {
        $nombre="sumar";
    }
    else
    {
        if(isset($_POST['botonResta']))
        {
            $nombre="restar";
        }
        else
        {
            if(isset($_POST['botonMulti']))
            {
                $nombre="multi";
            }
            else
            {
                $nombre ="divi";
            }
        }
    }

    return $nombre;
}
function proceso()
{
    if(isset($_POST['botonSuma']) || isset($_POST['botonResta']) || isset($_POST['botonMulti']) || isset($_POST['botonDivi']))
    {
        $nombreBoton = saberBoton();
        $function = saberFuncionDeBoton();
        $numError = count(validar());
        $errores=validar();
        if($numError>0)
        {
            foreach($errores as &$valor)
            {
                pintor($valor);
            }
        }
        else
        {
            $n1 = $_POST['numero1'];
            $n2 = $_POST['numero2'];
            $funcion = $function($n1,$n2);
            pintor($funcion);
        }
    }
    
}

function pillaBuenos()
{
    $buenos = array();
    
    if(isset($_POST['numero1']) && $_POST['numero1']!='')
    {   
        if(is_numeric($_POST['numero1']))
        {
            $buenos['numero1'] = $_POST['numero1'];
        }
    }

    if(isset($_POST['numero2']) && $_POST['numero2']!='')
    {
        if(is_numeric($_POST['numero2']))
        {
            $buenos['numero2']=$_POST['numero2'];
        }
    }
    
    return $buenos;
}

function pintor($dato)
{
    echo $dato;
}


function sumar($n1,$n2)
{
    return $n1+$n2;
};

function restar($n1,$n2)
{
    return $n1-$n2;
};

function multi($n1,$n2)
{
    return $n1*$n2;
};

function divi($n1,$n2)
{
    return $n1/$n2;
};