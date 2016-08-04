
<?php
$dirPath='/mnt/hgfs/project';//目录,结尾不加’/‘

//执行遍历
recursion_readdir($dirPath);


function forChar($char='-',$times=0){
    $result='';
    for($i=0;$i<$times;$i++){
        $result.=$char;
    }
    return $result;
}

function recursion_readdir($dirPath,$Deep=0){
    $resDir=opendir($dirPath);
    while($basename=readdir($resDir)){
        //当前文件路径
        $path=$dirPath.'/'.$basename;
       // $substring=substr($path,strlen('/mnt/hgfs/project'),strlen($dirPath)-strlen('/mnt/hgfs/project'));
        //echo $substring;
        if(is_dir($path) AND $basename!='.' AND $basename!='..'){
            //是目录，打印目录名，继续递归
            echo forChar('-',$Deep).$basename.'/<br/>';
            $Deep++;//深度+1
            recursion_readdir($path,$Deep);
        }else if(basename($path)!='.' AND basename($path)!='..'){
            //不是文件夹，打印文件名
            echo forChar('-',$Deep).basename($path).'<br/>';
        }

    }
    closedir($resDir);
}