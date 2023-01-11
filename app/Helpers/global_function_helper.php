<?php
function sent_email($attachment,$to,$title,$message)
{
	$Email = \Config\Services::email();
	$EmailSender = EMAIL_ALAMAT;
	$EmailName = EMAIL_NAMA;

	$config['protocol'] = "smtp";
	$config['SMTPHost'] = "smtp.gmail.com";
	$config['SMTPUser'] = $EmailSender;
	$config['SMTPPass'] = EMAIL_PASSWORD;
	$config['SMTPPort'] = 465;
	$config['SMTPCrypto'] = "ssl";
	$config['mailType'] = "html";

	$Email->initialize($config);
	$Email->setFrom($EmailSender, $EmailName);
	$Email->setTo($to);

	if($attachment)
	{
		$Email->attach($attachment);
	}

	$Email->setSubject($title);
	$Email->setMessage($message);

	if(!$Email->send())
	{
		$data = $Email->printDebugger(['headers']);
		print_r($data);
		return false;
	}
	else
	{
		return true;
	}

	
}

	function number($currentPage, $TotalPage)
	{
		if(is_null($currentPage))
		{
			 $number = 1;
		}
		else
		{
			$number = 1+($TotalPage * ($currentPage - 1));
		}
		return $number;
	}
?>