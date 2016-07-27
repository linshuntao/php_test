<?php
/**
 * Created by PhpStorm.
 * User: linshuntao
 * Date: 2016/7/26
 * Time: 9:34
 */

function quickSort(&$arr,$low,$top){
    //递归出口
    if($low<$top){
        //获得的基点的位置
        $pos=partition($arr,$low,$top);
        //递归数组
        quickSort($arr,$low,$pos-1);
        quickSort($arr,$pos+1,$top);
    }
    return $arr;
}

function partition(&$arr,$low,$top){
    //将首位数字作为比较的基点
    //$key=$arr[$low];
    $key=$low;

    //$i=$low;
    //for($j=$low+1;$j<=$top;$j++){
    // if($arr[$j]<=$key){
    //将后续的每个数字与基点相比较，小的放在基点的左边，大的保持位置不变。
    //  $i++;
    // $temp=$arr[$i];
    // $arr[$i]=$arr[$j];
    //  $arr[$j]=$temp;
    //  }
    while($low<$top){
        //大小同时交换，相比上面的代码提高了效率
        while($arr[$key]<=$arr[$top] && $low<$top){
            $top--;
        }
        while($arr[$key]>=$arr[$low] && $low<$top){
            $low++;
        }
        if($low!=$top){
            $temp=$arr[$low];
            $arr[$low]=$arr[$top];
            $arr[$top]=$temp;
           // echo $low.'  '.$top.'<br>';
            echo $arr[$low].'<-->'.$arr[$top].'<br>';
            for($c=0;$c<count($arr);$c++){
                echo $arr[$c].' ';
            }
            echo '<br>';
        }
    }
    //将基点与最后交换所得的数字交换，原数组便被基点切割成大小2个数组
    $temp=$arr[$low];
    $arr[$low]=$arr[$key];
    $arr[$key]=$temp;
    echo $arr[$low].'<-->'.$arr[$key].'<br>';
    for($c=0;$c<count($arr);$c++){
        echo $arr[$c].' ';
    }
    echo '<br>';
    //返回基点的交换后的位置，将2个数组再次循环
    return $low;
}

$array=array(12,14,85,46,32,843,3,647,169,68,741,24,489,5,1,102,203);
//var_dump($array);
for($c=0;$c<count($array);$c++){
    echo $array[$c].' ';
}
echo '<br>';
$n=count($array)-1;
$array=quickSort($array,0,$n);
//var_dump($array);
for($c=0;$c<count($array);$c++){
    echo $array[$c].' ';
}