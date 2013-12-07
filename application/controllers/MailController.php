<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MailController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
		try {
			$config = array(
				'auth' => 'login',
				'username' => 'se.somitc41@gmail.com',
				'password' => 'sesom9221',
				'ssl' => 'tls',
				'port' => 587
			);
			$mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
			Zend_Mail::setDefaultTransport($mailTransport);
		} catch (Zend_Exception $e) {
			//Do something with exception
		}
	}

	public function indexAction() {
		
	}

	public function sendmailAction() {
		//Prepare email
		$email = 'se.somitc42@gmail.com';
		$subject = 'Hello';
		$message = 'How are you ?';
		$mail = new Zend_Mail();
		$mail->addTo($email);
		$mail->setSubject($subject);
		$mail->setBodyText($message);
		$mail->setFrom('se.somitc41@gmail.com', 'sesom');

//Send it!
		$sent = true;
		try {
			$mail->send();
		} catch (Exception $e) {
			$sent = false;
		}

//Do stuff (display error message, log it, redirect user, etc)
		if ($sent) {
			//Mail was sent successfully.
		} else {
			//Mail failed to send.
		}
	}

}

?>
