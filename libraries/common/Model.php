<?php 

    // Model class for manipulation data from database

	abstract class Model {

		abstract public function tablename();

		public static function findAll(){

		}

		public static function find($id) {
			
		}

		public function save() {
			if ($this->isNewRecord) {
				$this->create();
			} else {
				$this->update();
			}
		}

		public function create() {

		}

		public function update() {

		}

		public function load() {

		}

		public function delete() {

		}

        
	}

?>