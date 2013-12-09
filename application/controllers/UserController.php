<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends Zend_Controller_Action {

	public function init() {
		
	}

	public function indexAction() {
		$pass = '123456';
		echo $this->EnscreptHashSha512($pass);
		echo '<br />';
		echo $this->EnscreptHashSha512($pass);
	}

	public function registerAction() {
		
	}

	public function loginAction() {
		
	}
	 public function EnscreptHashSha512($passwordEnscript) {
        try {
            return hash("sha512", md5(sha1(md5($passwordEnscript))));
        } catch (ErrorException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
