<?php

    function poly_ch($s, $l, $r, $cl = "") { 
        //
        //$s -> size int
        //$l -> sides int
        //$r -> radius float
        //$c -> classes string

        $pnts = [];
        $c = $s/2; //circle center
        $ca = 360/$l; //center radius 



        for($ang = $ca; $ang <= 360; $ang = $ang + $ca) {
            $sin = sin(deg2rad($ang));
            $cos = cos(deg2rad($ang));

            $coorX = $c + ($cos * $r);
            $coorY = $c + ($sin * $r);
            if($ang == 360) {
                $coorXY = $coorX." ".$coorY;
            }
            else {
                $coorXY = $coorX." ".$coorY.", ";
            }
            array_push($pnts, $coorXY);
        }

            echo "<svg class=\"$cl\" width=\"".$s."px\" height=\"".$s."px\">
                <polygon points=\"";

                for($i = 0; $i <= count($pnts); $i++) {
                    echo $pnts[$i];
                }

        echo "
                \"
                >
            </svg>"
        ;

    }

    poly_ch(200, 3, 40, 0);
    poly_ch(200, 4, 40, 0);
    poly_ch(200, 5, 40, 0);

?>
