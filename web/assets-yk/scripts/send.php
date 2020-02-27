<?php
if ($_POST) { 
    $name = htmlspecialchars($_POST["name"]); 
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);
    $json = array(); 
    if (!$name or !$email or !$phone) { 
        $json['error'] = 'You did not fill the whole field!';
        echo json_encode($json); 
        die(); 
    }
    if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)) {
        $json['error'] = 'Not a valid email! >_<'; 
        echo json_encode($json); 
        die(); 
    }
    if (!preg_match("|^[0-9]+$|", $phone)) {
        $json['error'] = 'Not a valid phone! >_<'; 
        echo json_encode($json); 
        die(); 
    }

    function mime_header_encode($str, $data_charset, $send_charset) { 
        if($data_charset != $send_charset)
        $str=iconv($data_charset,$send_charset.'//IGNORE',$str);
        return ('=?'.$send_charset.'?B?'.base64_encode($str).'?=');
    }
   
    class TEmail {
    public $from_email;
    public $from_name;
    public $to_email;
    public $to_name;
    public $subject;
    public $data_charset='UTF-8';
    public $send_charset='windows-1251';
    public $body='';
    public $type='text/plain';

    function send(){
        $dc=$this->data_charset;
        $sc=$this->send_charset;
        $enc_to=mime_header_encode($this->to_name,$dc,$sc).' <'.$this->to_email.'>';
        $enc_subject=mime_header_encode($this->subject,$dc,$sc);
        $enc_from=mime_header_encode($this->from_name,$dc,$sc).' <'.$this->from_email.'>';
        $enc_body=$dc==$sc?$this->body:iconv($dc,$sc.'//IGNORE',$this->body);
        $headers='';
        $headers.="Mime-Version: 1.0\r\n";
        $headers.="Content-type: ".$this->type."; charset=".$sc."\r\n";
        $headers.="From: ".$enc_from."\r\n";
        return mail($enc_to,$enc_subject,$enc_body,$headers);
    }

    }

    $emailgo= new TEmail; 
    $emailgo->from_email= $email; 
    $emailgo->from_name= $name;
    $emailgo->to_email= 'Nikray1991@gmail.com'; // send the letter
    $emailgo->to_name= '';
    $emailgo->subject= 'Yeahkids'; // Message subject
    $emailgo->body= 'Phone number: ' . $phone . "\r\n" . 'Message: ' . $message; 
    $emailgo->send(); 

    echo json_encode($json); 
} else { 
    echo 'GET LOST!'; 
}
?>