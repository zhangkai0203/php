<?php
class Vcode{
    private $width;   //图片宽度
    private $height;  //图片高度
    private $num;     //验证码个数
    private $code;    //验证码
    private $point;   //干扰点
    private $line;    //干扰线
    private $img;     //图片资源
    private $font;    //字体
    //初始化默认值
    public function __construct($width=100,$height=30,$num=5){
         $this->width  = $width;
         $this->height = $height;
         $this->num    = $num;
         $this->code   = $this->getcode($num,1);
         $this->point  = 100;
         $this->line   = 10;
         $this->font   = "msyh.ttf";
    }

    /**
     *   生成随机验证码
     * @param int $num  验证码的个数
     * @param int $type 验证码类型  0：0-9  1：0-9 a-z  2:0-9 a-z A-Z
     * @return string   返回随机验证码
     */
    private function getCode($num=4,$type=0){
        $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHILJKMNOPQSTUVWXYZ";
        $t = array(9,35,strlen($str)-1);
        //随机成成验证码
        $c = '';
        for ($i=0;$i<$num;$i++){
            $c.= $str[rand(0,$t[$type])];
        }
        return $c;
    }
    public function fun(){
        $this->create_img();
        $this->create_line();
        $this->create_point();
        $this->create_image();
    }
    private function create_img(){
        header("Content-Type:image/png");
        //创建图片
        $this->img = imagecreate($this->width,$this->height);
        //字体颜色
        $color = imagecolorallocate($this->img,111,0,55);
        //背景颜色
        $bgcolor = imagecolorallocate($this->img, 255, 255, 255);
        //填充背景
        imagefill($this->img, 0, 0, $bgcolor);
    }
    //随机添加干扰点
    private function create_point(){
        for($i=0;$i<200;$i++){
            $c = imagecolorallocate($this->img,rand(0,255),rand(0,255),rand(0,255));
            imagesetpixel($this->img,rand(0,$this->width),rand(0,$this->height),$c);
        }
    }
    //随机添加干扰线
    private function create_line(){
        for($i=0;$i<5;$i++){
            $c = imagecolorallocate($this->img,rand(0,255),rand(0,255),rand(0,255));
            imageline($this->img,rand(0,$this->width),rand(0,$this->height),rand(0,$this->width),$this->height,$c);
        }
    }
    //随机颜色
    private function get_color(){
        return imagecolorallocate($this->img,rand(0,255),rand(0,255),rand(0,255));
    }
    //绘制验证码信息
    public function create_image(){
        //$im 资源  字体大小 角度  每个字节偏离值  高度  字体颜色  字体库  内容
        for($i=0;$i<$this->num;$i++){
            imagettftext($this->img,18,rand(20,-20),8+(18*$i),24,$this->get_color(),$this->font,$this->code[$i]);
        }
        imagepng($this->img);
    }

    //销毁图片资源
    public function __destruct()
    {
        imagedestroy($this->img);
    }

}
$vcode = new Vcode();
$vcode->fun();

