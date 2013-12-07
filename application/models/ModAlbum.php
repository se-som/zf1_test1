<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_ModAlbum extends Zend_Db_Table_Abstract {

	public $tbAlbum = null;
	public $albums;
	public $db;

	public function __construct() {
		$this->tbAlbum = new Application_Model_DbTable_Album;
		$this->db = Zend_Db_Table::getDefaultAdapter();
	}

	public function fetchAll() {
		try {
			$select = $this->db->select()
					->from('album');
			$this->albums = $this->db->fetchAll($select);
			return $this->albums;
		} catch (ErrorException $ex) {
			echo "Messagge : " . $ex->getMessage();
		}
	}

	public function saveAlbum($album) {
		$this->db->insert('album', $album);
	}

	public function getAlbum($id) {
		try {
			$select = $this->db->select()
					->from('album')
					->where('id =? ', $id);
			$this->getAlbum = $this->db->fetchAll($select);
			return $this->getAlbum;
		} catch (ErrorException $ex) {
			echo "Messagge : " . $ex->getMessage();
		}
	}

	public function updateAlbum($dataAlbum, $id) {
		$where = "id = $id";
		try {
			$this->db->update('album', $dataAlbum, $where);
		} catch (ErrorException $ex) {
			echo "Messagge : " . $ex->getMessage();
		}
	}

	public function deleteAlbum($id) {
		$where = "id = $id";
		try {
			$this->db->delete('album', $where);
		} catch (ErrorException $ex) {
			echo "Messagge : " . $ex->getMessage();
		}
	}

}

?>
