<?php

class OpenSSL{
    
    private $chave = "UFABC_PUMAS";
    private $iv = "1.2.3.5.7.11.13";

    public function __construct() {
        $this -> chave = hash('sha256', $this -> chave);
        $this -> iv = substr(hash('sha256', $this -> iv), 0, 16);
    }

    public function encrypt($string){
        return base64_encode(openssl_encrypt($string, "AES-256-CBC", $this -> key, 0, $this -> iv));
    }

    public function decrypt($string){
        return openssl_decrypt(base64_decode($string), "AES-256-CBC", $this -> key, 0, $this -> iv);
    }
}

$obj_ssl = new OpenSSL();

$texto = "Um esqueleto entrou num bar, pediu uma cerveja e um esfregão.";
$crypt = $obj_ssl -> encrypt($texto);
$decrypt = $obj_ssl -> decrypt($crypt);

echo "Texto Original: " . $texto . "<br/><br/>";
echo "Texto Criptografado: " . $crypt . "<br/><br/>";
echo "Texto Descriptografado: " . $decrypt;
?>