<?php

class paginar
{



public function __construct() {

}

    static function paginar($tota_reg,$pagina,$numero_fila){

        $tota_paginas=ceil($tota_reg/$numero_fila);

        if($tota_paginas <= 5){
            $inicio=1;
            $_fin=$tota_paginas;
        }else{
            for ($i=1; $i <=2 ; $i++) { 
                if(($pagina + $i) >= $tota_paginas){
                    $_fin=$tota_paginas;
                    $inicio=($tota_paginas-5);
                }
                else{
                    $_fin=$pagina+$i;
                }
                if (($pagina - $i) <= 0) {
                    $inicio=1;
                }else{
                    $inicio=$pagina-$i;
                }
            }

            if ($pagina==1 || $pagina==2 ) {
                $_fin=5;
            }
            if ($_fin==$tota_paginas ) {
            $inicio=($tota_paginas-4);
            }
            if($_fin==($tota_paginas-1 )){
            $inicio=($tota_paginas-5);
            }
        }
        $desde=((($pagina*$numero_fila)-$numero_fila));

       // $desde = ($desde<=0) ? "0" : $desde ;

        return $array = array(

            'inicio' => $inicio ,
             'fin' => $_fin,
              'total_pagina'=> $tota_paginas, 
              'desde' => $desde,
              'pagina' => $pagina
              );

    }




}

?>
