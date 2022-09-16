<?php

function enviar_email($email, $mensagem){

	$subject = "Conta Afiliado Woobe";
	$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
	$headers .= "From: Woobe <suporte@woobe.com.br>";
	$headers .= "\r\nReply-To: suporte@woobe.com.br";
	
	if(mail($email,$subject,$mensagem, $headers,"-f suporte@woobe.com.br")){
		return TRUE;
	}else{
		return FALSE;
	}

}