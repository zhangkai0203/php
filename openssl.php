<?php
/**
*  openssl加密方式
*/

class opensslDemo{

    private $method = 'AES-128-CBC';     //加密方式
    private $key = '123456';             //秘钥
    private $option = 0;


    public function getIv(){

        $ivleng = openssl_cipher_iv_length($this->method);
        $iv = openssl_random_pseudo_bytes($ivleng);
        $iv = base64_encode($iv);

        return substr($iv,0,$ivleng);
    }

    public static function encrpty($data){

        $arr['iv'] = $this->getIv();

        $arr['data'] = openssl_encrypt(serialize($data),$this->method,$this->key,$this->option,$arr['iv']);

        return base64_encode(json_encode($arr));
    }

    //解密
    public static function decrypt($str){

        $data = json_decode(base64_decode($str),true);

        $res = openssl_decrypt($data['data'],$this->method,$this->key,$this->option,$data['iv']);
        return unserialize($res);


    }
}

$ssl = new opensslDemo();
$result = $ssl->encrpty(['name'=>'zhangsan','age'=>12]);
$data = $ssl->decrypt($result);
var_dump($data);

die;


//加密函数
function encrypt($id){
	
	//序列化数据
    echo $data = serialize($id);
	
	//密码列表
    $method = openssl_get_cipher_methods();
	
	//秘钥
	$key = '123456';

	//$ivleng = openssl_cipher_iv_length($method[0]);
    //$iv = openssl_random_pseudo_bytes($ivleng);

   echo $iv = substr('fdakinel;injajdji456456f4dsa4fs',0,16);

	//加密
    $data = openssl_encrypt($data,$method[0],$key,0,$iv);
    return $data;
	
}
//解密函数
function decrypt($data){
    //密码列表
    $method = openssl_get_cipher_methods();
    //秘钥
    $key = '123456';

    //$ivleng = openssl_cipher_iv_length($method[0]);
    //$iv = openssl_random_pseudo_bytes($ivleng);
    $iv = base64_encode(substr('fdakinel;injajdji',0,16));

    $result = openssl_decrypt($data,$method[0],$key,0,$iv);
    $rs = unserialize($result);
    var_dump($rs);
}
$result = encrypt(array('name'=>'zhangsan','age'=>12,'sex'=>1));
decrypt($result);



die;
/**
* 公钥和私钥加密方式
*/


//扩张是否加载
extension_loaded('openssl') or die('error kuozhan');

$private_key = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQC3//sR2tXw0wrC2DySx8vNGlqt3Y7ldU9+LBLI6e1KS5lfc5jl
TGF7KBTSkCHBM3ouEHWqp1ZJ85iJe59aF5gIB2klBd6h4wrbbHA2XE1sq21ykja/
Gqx7/IRia3zQfxGv/qEkyGOx+XALVoOlZqDwh76o2n1vP1D+tD3amHsK7QIDAQAB
AoGBAKH14bMitESqD4PYwODWmy7rrrvyFPEnJJTECLjvKB7IkrVxVDkp1XiJnGKH
2h5syHQ5qslPSGYJ1M/XkDnGINwaLVHVD3BoKKgKg1bZn7ao5pXT+herqxaVwWs6
ga63yVSIC8jcODxiuvxJnUMQRLaqoF6aUb/2VWc2T5MDmxLhAkEA3pwGpvXgLiWL
3h7QLYZLrLrbFRuRN4CYl4UYaAKokkAvZly04Glle8ycgOc2DzL4eiL4l/+x/gaq
deJU/cHLRQJBANOZY0mEoVkwhU4bScSdnfM6usQowYBEwHYYh/OTv1a3SqcCE1f+
qbAclCqeNiHajCcDmgYJ53LfIgyv0wCS54kCQAXaPkaHclRkQlAdqUV5IWYyJ25f
oiq+Y8SgCCs73qixrU1YpJy9yKA/meG9smsl4Oh9IOIGI+zUygh9YdSmEq0CQQC2
4G3IP2G3lNDRdZIm5NZ7PfnmyRabxk/UgVUWdk47IwTZHFkdhxKfC8QepUhBsAHL
QjifGXY4eJKUBm3FpDGJAkAFwUxYssiJjvrHwnHFbg0rFkvvY63OSmnRxiL4X6EY
yI9lblCsyfpl25l7l5zmJrAHn45zAiOoBrWqpM5edu7c
-----END RSA PRIVATE KEY-----';
 
$public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC3//sR2tXw0wrC2DySx8vNGlqt
3Y7ldU9+LBLI6e1KS5lfc5jlTGF7KBTSkCHBM3ouEHWqp1ZJ85iJe59aF5gIB2kl
Bd6h4wrbbHA2XE1sq21ykja/Gqx7/IRia3zQfxGv/qEkyGOx+XALVoOlZqDwh76o
2n1vP1D+tD3amHsK7QIDAQAB
-----END PUBLIC KEY-----';

$pu_key = openssl_pkey_get_public($public_key);

$pi_key = openssl_pkey_get_private($private_key);


$data = 'abcd';
$encrypted = "";
$decrypted = "";

/**
* 加入base64是处理乱码问题
*/

//加密信息
openssl_private_encrypt($data,$encrypted,$pi_key);
$encrypted = base64_encode($encrypted);
echo $encrypted."<br/>";


//解密信息
openssl_public_decrypt(base64_decode($encrypted),$decrypted,$pu_key);
echo $decrypted;

//加密公钥
openssl_public_encrypt($data,$encrypted,$pu_key);
echo  base64_encode($encrypted);

//解密公钥
openssl_private_decrypt(base64_decode($encrypted),$decrypted,$pi_key);
echo $decrypted;




































