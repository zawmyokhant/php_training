<?php
$a = 6;
for ($b=1;$b<=$a;$b++) {
for ($c=1;$c<=(2*$a)-1;$c++){
    if ($c>=$a-($b-1) && $c<=$a+($b-1)) {
        echo "*";
    }else {
        echo "&nbsp;&nbsp;";
    }
}
echo "<br/>";
}
for ($b=$a-1;$b>=1;$b--) {
    for ($c=1;$c<=(2*$a)-1;$c++){
        if ($c>=$a-($b-1) && $c<=$a+($b-1)) {
            echo "*";
        }else {
            echo "&nbsp;&nbsp;";
        }
    }
    echo "<br/>";
    }
?>