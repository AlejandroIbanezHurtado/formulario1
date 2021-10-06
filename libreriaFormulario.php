<?php
function validar($nombreBoton)
{
    $res=false;
    if(isset($_POST['numero1']) && isset($_POST['numero2']) && isset($_POST[$nombreBoton]))
    {
        if(is_numeric($_POST['numero1']) && is_numeric($_POST['numero2']))
        {
            $res=true;
        }
        else
        {
            $res=false;
        }
    }
    else
    {
        $res=false;
    }
    return $res;
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
    $nombreBoton = saberBoton();
    $function = saberFuncionDeBoton();

    if(validar($nombreBoton)==true)
    {
        $n1 = $_POST['numero1'];
        $n2 = $_POST['numero2'];
        $funcion = $function($n1,$n2);
        pintor($funcion);
    }
    else
    {
        header("Location: formulario.php");
    }
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