<?php
/**
 * Created by PhpStorm.
 * User: linshuntao
 * Date: 2016/7/28
 * Time: 14:55
 */
    class validationClass{
        private $a;
        private $validateRule;
        private $sanitizeRule;


        //public function removeString($string){
            //return str_replace('智障','少年，你又调皮了',$string);
        //}
        function sanitizeString($string){
            echo filter_var($string, FILTER_CALLBACK,
                array("options"=>"removeString"));

        }

        function sanitizeData($aa,$str){
            $this->a=$aa;
            $this->setsanitizeRule();
            $this->sanitize($str);
        }
        private function setsanitizeRule(){
            switch($this->a){
                case 0: $this->sanitizeRule=FILTER_SANITIZE_STRING;
                        break;
                case 1: $this->sanitizeRule=FILTER_SANITIZE_ENCODED;
                    break;
                case 2: $this->sanitizeRule=FILTER_SANITIZE_SPECIAL_CHARS;
                    break;
                case 3: $this->sanitizeRule=FILTER_SANITIZE_EMAIL;
                    break;
                case 4: $this->sanitizeRule=FILTER_SANITIZE_URL;
                    break;
                case 5: $this->sanitizeRule=FILTER_SANITIZE_NUMBER_INT;
                    break;
                case 6: $this->sanitizeRule=FILTER_SANITIZE_NUMBER_FLOAT;
                    break;
                case 7: $this->sanitizeRule=FILTER_UNSAFE_RAW;
                    break;
            }
        }

        private function sanitize($s){
            echo(filter_var($s,$this->sanitizeRule));
        }

        function validateData($aa,$str){
           $this->a=$aa;
            $this->setvalidateRule();
            return $this->validate($str);
        }

        private  function setvalidateRule(){
            switch($this->a){
                case 0: $this->validateRule=FILTER_VALIDATE_EMAIL;
                        break;
                case 1: $this->validateRule=FILTER_VALIDATE_IP;
                        break;
                case 2: $this->validateRule=FILTER_VALIDATE_URL;
                        break;
                case 3: $this->validateRule=FILTER_VALIDATE_FLOAT;
                    break;
                case 4: $this->validateRule=FILTER_VALIDATE_BOOLEAN;
                    break;
                case 5: $this->validateRule=FILTER_VALIDATE_INT;
                    break;
            }
        }

        private  function validate($s){
             if(filter_var($s,$this->validateRule)){
                 $result='yes';
                 return $result;
             }
            else{
                $result='no';
                return $result;
            }
        }

        function validateNumRange($aa,$min,$max){
            $options = array(
                'options' => array(
                    'min_range' => $min,
                    'max_range' => $max,
                )
            );
            if(filter_var($aa,FILTER_VALIDATE_INT,$options)==true){
                echo 'The number is in the range.';
            }
            else{
                echo 'The number is not in the range.';
            }

        }
    }

$a= new validationClass();
    echo $a->validateData(2,"http://www.example.com").'<br>';
    echo $a->validateData(0,'635292207@qq.com').'<br>';
    echo $a->validateData(1,'119.29.56.241').'<br>';
    echo $a->validateData(3,3333.5555).'<br>';
    echo $a->validateData(4,0).'<br>';
    echo $a->validateData(5,5).'<br>';
    $a->validateNumRange(2,1,4);
    echo '<br>';

    $a->sanitizeData(3,'635(292207)@qq.com');
    echo '<br>';
    $a->sanitizeData(0,'12344<>2222');
    echo '<br>';
    $a->sanitizeData(5,'1234+4<>2222');
    echo '<br>';
    $a->sanitizeData(6,'1234-4<>2222');
    echo '<br>';
   // echo '<br>'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>';

    $sw='你是傻逼吗智障,死全家，你妈';
    echo $sw.'<br>';
    $a->sanitizeString($sw);



function removeString($string){
    $restring=array('智障','傻逼','你妈','死全家');
    $count=count($restring);
    for($i=0;$i<$count;$i++){
        $string=str_replace($restring[$i],'*',$string);
    }
    return $string;
}


