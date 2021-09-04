<?php

    class polygon_chart {

        public $class = "";
        public $size = 0;
        public $center = 0;
        public $polygons = "";

        function ch_ini($sizes, $classes) {
            $this->class = $classes;
            $this->size = $sizes;
            $this->center = $sizes/2;
            //variables
            //$width = svg width size 
            //$height = svg height size
            //$class_sufix = sufix pattern to auto classes  
            

            $ini_svg = "<svg 
                class=\"".$classes."-root\" 
                width=\"".$sizes."\" 
                height=\"".$sizes."\">";

            $this->polygons.=$ini_svg;
        }
        
        function ch_polys($faces, $webs = 1) {
            //variables
            //$faces = number of polygon faces
            //$webs = number of poligns
            //$ca = center angle

            $ca = 360/$faces;

            for($w = 1; $w <= $webs; $w++) {
                $poly = "<polygon ";
                if($w==1){$poly.="class=\"".$this->class."-main\" ";}else{$poly.="class=\"".$this->class."-ghost\" ";}
                $poly.= "points=\"";
                $radius = ($this->center/1.5)*$w/$webs;

                for($ang = $ca; $ang < 360 + $ca; $ang = $ang + $ca) {
                    $sin = sin(deg2rad($ang));
                    $cos = cos(deg2rad($ang));
    
                    $coorX = $this->center + ($cos * $radius);
                    $coorY = $this->center + ($sin * $radius);

                    if($ang == 360) {
                        $poly.=$coorX.", ".$coorY;
                    } else {
                        $poly.=$coorX.",".$coorY." ";
                    }
                }

                $poly.="\"/>";
                $this->polygons.=$poly;
            }
        }

        function ch_end() {
            $this->polygons.="</svg>";
            return $this->polygons;
        }
    }

    $triangle = new polygon_chart();
    $triangle->ch_ini(200, "triangle");
    $triangle->ch_polys(4, 3);
    echo $triangle->ch_end();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .triangle-main, .triangle-ghost {
            fill: rgba(0,0,0,0);
            stroke-width: 5;
            stroke: black;
        }
    </style>
</head>
<body>
    
</body>
</html>
