<?php 

class Car extends Model {

	public function tableName() {
		return 'product';	
	} 

	public $id;
	public $name;
	public $type;

}