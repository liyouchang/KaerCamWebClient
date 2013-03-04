<?php

class Socket_model extends CI_Model {

	 public $center_ip ;
	 public $center_port;
	 protected $socket;
	 function __construct() {
	 	parent::__construct();
	 	$this->center_ip = "192.168.2.247";
	 	$this->center_port=22616;
	 }
	 
	 protected $requestMsgFromat = array(
	 		 "setcretKey"=>"H4II",
	 		"login"=>"H4IIIa8a8a16"
	 		);
	 protected $respondMsgFromat = array(
	 		"setcretKey"=>"H4head/Ilen/IclientID/a8secretKey",
	 		"login"=>"H4head/Ilen/IclientID/IuserLevel/H2respMsg"
	 );
	 
	 /**
	  * @function write and read from socket
	  * @param socket $socket
	  * @param string $writeStr
	  * @param number $readLen
	  * return the read string
	  */
	 public function writeAndRead($writeStr,$readLen=1024)
	 {
	 	$sent = socket_write($this->socket, $writeStr);
	 	if($sent === FALSE)
	 	{
	 		throw new Exception("socket_write() failed: reason: " . socket_strerror(socket_last_error()));
	 	}
	 	$out = socket_read($this->socket, $readLen);
	 	if($out === FALSE)
	 	{
	 		throw new Exception("socket_read() failed: reason: " . socket_strerror(socket_last_error()));
	 	}
	 	if(strlen($out) == 0 )
	 	{
	 		throw new Exception("socket_read() read 0 message" );
	 		
	 	}
	 	return $out;
	 }
	 
	 /**
	  * 
	  * @throws Exception
	  */
	 public function connectServer()
	 {
	  	$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	  	
	 	if ($this->socket === FALSE )
	 	{
	 		throw new Exception("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
	 	}
	 	 
	 	$connection = socket_connect($this->socket, $this->center_ip, $this->center_port);    //连接服务器端socket
	 	if($connection === FALSE)
	 	{
	 		throw new Exception("socket_connect() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
	 	}
	 	socket_set_option($this->socket,SOL_SOCKET,SO_RCVTIMEO,array("sec"=>2, "usec"=>0 ) );
	 	socket_set_option($this->socket,SOL_SOCKET,SO_SNDTIMEO,array("sec"=>3, "usec"=>0 ) );
	 }
	 /**
	  * 登陆服务器
	  * userName: string 用户名
	  * passWord: string 密码
	  * return: string 登陆信息
	  */
	 public function login($userName,$passWord)
	 {	
		try {
				
			$this->connectServer();
			$sendMsg = pack($this->requestMsgFromat['setcretKey'],"FFD0","10","0");				
			$recvMsg = $this->writeAndRead($sendMsg);
			$outArray = unpack($this->respondMsgFromat['setcretKey'],$recvMsg);
			//获取 密钥
			$secretKey = $outArray['secretKey'];
			//生成16位加密数据(md5 加密）
			$usrkeypwd = pack("a8a8a8",$userName,$secretKey,$passWord);
			$secretData= md5($usrkeypwd,TRUE);
			
			
			$sendMsg = pack($this->requestMsgFromat['login'],"FF80","46","0","0",$userName,"",$secretData);
			$recvMsg =  $this->writeAndRead($sendMsg);
			$outArray = unpack($this->respondMsgFromat['login'],$recvMsg);
				
		} catch (Exception $e) {
			log_message('error',$e->getMessage());
			var_dump($e->getMessage());
			return "00";
		}	

		
	 //	var_dump($outArray);
	 	socket_close($this->socket);
	 	
	 	return $outArray['respMsg']; 
	 }
	
}
