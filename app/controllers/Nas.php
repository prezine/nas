<?php
	/**
	 * 
	 */
	class NasAcademy
	{
		private $app_name;
		private $app_version;
		public function __construct()
		{
			$this->app_name = "NasAcademy";
			$this->app_version = "v1.0";
		}
		public function app_name()
		{
			return $this->app_name;
		}
		public function version()
		{
			return $this->version;
		}
		public function viewJson()
		{
			header("Content-Type: Application/json");
		}
		public function setSession($name = '', $value = '')
		{
			$_SESSION[$name] = $value;
		}
		public function updateSession($name = '', $value = '')
		{
			$_SESSION[$name] = $value;
		}
		public function getSession($name = '')
		{
			return (!isset($_SESSION[$name])) ? NULL : $_SESSION[$name] ;
		}
		public function killSession($name = '')
		{
			unset($_SESSION[$name]);
			session_destroy();
			session_unset();
			return 200;
		}
		public function cleanurl($param = '')
		{
			return explode(".", $param)[0];
		}
		public function res($msg = '', $status = '')
		{
			$output = array(
				'status' => $status,
				'message' => $msg,
			);
			return json_encode($output, true);
		}
		public function env($var = '')
		{
			return $_ENV[$var];
		}
		public function mt_rand_str($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890')
    	{
			for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
			return $s;
    	}
		public function rateLimiter()
		{
			// Max http requests a host can make
			$cap = 3; 
			// The period in which it limits, 60 means 1 minuts
			$period = 5;
			$stamp_init = date("Y-m-d H:i:s");
			if($this->getSession('FIRST_REQUEST_TIME') !== NULL) {
				$this->setSession('FIRST_REQUEST_TIME', $stamp_init);
			}

			$first_request_time = $this->getSession('FIRST_REQUEST_TIME');
			$stamp_expire = date("Y-m-d H:i:s", strtotime($first_request_time) + ($period));
			if($this->getSession('REQ_COUNT')){
				$this->setSession('REQ_COUNT', 0);
			}
			$req_count = $this->getSession('REQ_COUNT');
			$req_count++;
			// Expired
			if($stamp_init > $stamp_expire) {
				$req_count = 1;
				$first_request_time = $stamp_init;
			}
			$this->setSession('REQ_COUNT', $req_count);
			$this->setSession('FIRST_REQUEST_TIME', $first_request_time);
			header('X-RateLimit-Limit: '. $cap);
			header('X-RateLimit-Remaining: ' . ($cap - $req_count));
			// Too many requests
			if($req_count > $cap){
				// http_response_code(429);
				$this->viewJson();
				echo $this->res('Too many request, try again shortly', 429);
				exit();
			}
		}
	}