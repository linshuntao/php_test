<?php  
require_once ('email.class.php'); 
//########################################## 
$smtpserver = "smtp.163.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "scut0418@163.com";//SMTP服务器的用户邮箱
$smtpemailto = "635292207@qq.com";//发送给谁
$smtpuser = "scut0418@163.com";//SMTP服务器的用户帐号
$smtppass = "shuntao449626816";//SMTPSMTP服务器的用户密码
$mailsubject = "测试邮件";//邮件主题
$mailbody = "<h1> hello_world $mailsubject</h1>";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
########################################## 
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤. 
$smtp->debug = true;//是否显示发送的调试信息
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
?> 