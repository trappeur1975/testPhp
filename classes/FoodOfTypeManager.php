<?php
	class FoodOfTypeManager{
		private $_db;

		public function __construct($db){
			$this->setDb($db);
		}

		public function add(FoodOfType $foodOfType){
			$query = $this->_db->prepare('insert into foodoftype
											set name= :name');
			$query->bindValue(':name', $foodOfType->getName());
			$query->execute();
			// $query->execute(array(':name' => $foodOfType->getName()));
		}

		public function delete(FoodOfType $foodOfType){
			$this->_db->exec('delete from foodOfType 
								where id = '.$foodOfType->getId());
		}

		public function get($id){
			$id = (int) $id;
			$query = $this->_db->query('select id, name
											from foodOfType
											where id='.$id);
			$datas = $query->fetch(PDO::FETCH_ASSOC);
			return new FoodOfType($datas);
		}

		public function getList(){
			$foodTypes = array();
			$query = $this->_db->query('select id, name 
											from foodOfType
											order by name');
			while($datas = $query->fetch(PDO::FETCH_ASSOC)){
				$foodTypes[] = new FoodOfType($datas);
			}
			return $foodTypes;
		}

		public function update(FoodOfType $foodOfType){
			$query = $this->_db->prepare('update foodOfType 
											set name = :name
											where id= :id');
			$query->bindValue(':name', $foodOfType->getName());
			$query->bindValue(':id', $foodOfType->getId(), PDO::PARAM_INT);
			$query->execute();
		}
	
	    /**
	     * @param mixed $_db
	     *
	     * @return self
	     */
	    public function setDb($_db)
	    {
	        $this->_db = $_db;

	        return $this;
	    }
	}

?>