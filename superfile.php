<?php
/**
 * Created by PhpStorm.
 * User: linshuntao
 * Date: 2016/8/3
 * Time: 14:23
 */

$file = fopen("test1.txt","a");
echo fwrite($file,"Hello World. Testing!");
for($i=0;$i<10000000;$i++)
    fwrite($file,$i."\r\n");
fclose($file);
function getLines($file) {
    $f = fopen($file, 'r');

        while ($line = fgets($f)) {
            yield $line;

    }
        fclose($f);

}
echo '开始内存：'.memory_get_usage(), '';
echo '<br>';
foreach (getLines("test1.txt") as $n => $line) {
    //if ($n > 5) break;
    echo $line;
}
echo '<br>';
echo '运行后内存：'.memory_get_usage(), '';
echo '<br>';
?>