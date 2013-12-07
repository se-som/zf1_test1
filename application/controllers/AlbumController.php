<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AlbumController extends Zend_Controller_Action {

	protected $albums;
	protected $tbAlbums;
	protected $getAlbum;
	public $album = array();

	public function init() {
		/* Initialize action controller here */
		//	$this->albums = new Application_Model_DbTable_Album();
		$this->tbAlbums = new Application_Model_ModAlbum();
	}

	public function indexAction() {
		$this->view->tbAlbums = $this->tbAlbums->fetchAll();
	}

	public function addAction() {
		if ($this->getRequest()->isPost()) {
			$album = $this->getRequest()->getPost();
			$this->tbAlbums->saveAlbum($album);
			$this->_helper->redirector('index');
		}
	}

	public function editAction() {
		if ($this->getRequest()->isPost()) {
			$title = $this->getRequest()->getPost('title');
			$artist = $this->getRequest()->getPost('artist');
			$dataAlbum = array('title'=>$title,'artist'=>$artist);
			$id = $this->getRequest()->getPost('id');
			$this->tbAlbums = new Application_Model_ModAlbum();
			$this->tbAlbums->updateAlbum($dataAlbum, $id);
			$this->_helper->redirector('index');
		} else {
			$id = $this->_getParam('id', 0);
			if ($id > 0) {
				$this->view->getAlbum = $this->tbAlbums->getAlbum($id);
			}
		}
	}
	public function deleteAction(){
		if ($this->getRequest()->isPost()) {
			
		} else {
			$id = $this->_getParam('id', 0);
			if ($id > 0) {
				$this->tbAlbums->deleteAlbum($id);
				$this->_helper->redirector('index');
			}
		}
	}

}

?>
