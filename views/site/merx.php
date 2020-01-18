<?php
        $file = 'http://10.0.6.103';
		$file_headers = @get_headers($file);
		if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$exists = false;
			$file = 'http://10.0.6.170';
			$file_headers = @get_headers($file);
			if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
				$exists = false;
				$file = 'http://merx2.cghmc.com/#/login';
				$file_headers = @get_headers($file);
				if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
					$exists = false;
					$file = 'http://merx.cghmc.com/#/login';
					$file_headers = @get_headers($file);
					if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
						$exists = false;
						$file = 'http://cgh.merx.medcurial.com';
						$file_headers = @get_headers($file);
						if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
							$exists = false;
						}
						else {
							$exists = true;
							header("Location: http://cgh.merx.medcurial.com", true, 301);
exit();
						}
					}
					else {
						$exists = true;
						header("Location: http://merx.cghmc.com", true, 301);
exit();
					}
				}
				else {
					$exists = true;
					header("Location: http://merx2.cghmc.com", true, 301);
exit();
				}
			}
			else {
				$exists = true;
				header("Location: http://10.0.6.170", true, 301);
exit();
			}
		}
		else {
			$exists = true;
			header("Location: http://10.0.6.103", true, 301);
exit();
		}
		
		function url_exists($url) {
			if (!$fp = curl_init($url)) return false;
			return true;
		}
?>