<?php 
class classEncriptar{
	public function encriptar_desincriptar($accion,$string){
		$output=false;
		$encriptarmetodo="AES-256-CBC";
		$palabrasecreta="mi clave para encriptar";
		$iv='C9fBxL1EWtYTL1/M8jfstw=="';
		$key=hash('sha256', $palabrasecreta);
		$siv=substr(hash('sha256',$iv),0,16);
		if ($accion=='encriptar') {
			$salida=openssl_encrypt($string, $encriptarmetodo, $key,0,$siv);
			$salida=base64_encode($salida);
		}elseif ($accion=='desencriptar') {
			$salida=openssl_decrypt(base64_decode($string), $encriptarmetodo, $key,0,$siv);
		}
		return $salida;
	}
}


?>