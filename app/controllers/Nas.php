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
	}