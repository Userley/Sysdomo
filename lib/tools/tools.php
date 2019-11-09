<?php
class tools
{

    public function GetMes($Nro_mes)
    {
        $mes = "";
        switch ($Nro_mes) {
            case '1':
                $mes = "enero";
                break;
            case '2':
                $mes = "febrero";
                break;
            case '3':
                $mes = "marzo";
                break;
            case '4':
                $mes = "abril";
                break;
            case '5':
                $mes = "mayo";
                break;
            case '6':
                $mes = "junio";
                break;
            case '7':
                $mes = "julio";
                break;
            case '8':
                $mes = "agosto";
                break;
            case '9':
                $mes = "setiembre";
                break;
            case '10':
                $mes = "octubre";
                break;
            case '11':
                $mes = "noviembre";
                break;
            case '12':
                $mes = "diciembre";
                break;
        }
        return $mes;
    }

    public function GetDia($Nro_dia)
    {
        $dia = "";
        switch ($Nro_dia) {
            case '1':
                $dia="lunes";
                break;
            case '2':
                $dia="martes";
                break;
            case '3':
                $dia="miércoles";
                break;
            case '4':
                $dia="jueves";
                break;
            case '5':
                $dia="viernes";
                break;
            case '6':
                $dia="sábado";
                break;
            case '7':
                $dia="domingo";
                break;
        }

        return $dia;
    }
}
