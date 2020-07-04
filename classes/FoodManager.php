<?php
	class FoodManager{
		private $_db;

		public function __construct($db){
			$this->setDb($db);
		}

		public function add(Food $food){
			$query = $this->_db->prepare('insert into food 
											set name= :name, calorie= :calorie, id_foodOfType= :id_foodOfType');
			$query->bindValue(':name', $food->getName());
			$query->bindValue(':calorie', $food->getCalorie(), PDO::PARAM_INT);
			$query->bindValue(':id_foodOfType', $food->getId_FoodOfType(), PDO::PARAM_INT);
			$query->execute();
		}

		public function delete(Food $food){
			$this->_db->exec('delete from food where id = '.$food->getId());
		}

		public function get($id){
			$id = (int) $id;
			$query = $this->_db->query('select id, name, calorie, id_foodOfType
											from food
											where id='.$id);
			$datas = $query->fetch(PDO::FETCH_ASSOC);
			return new Food($datas);
		}

		public function getList(){
			$foods = array();
			$query = $this->_db->query('select id, name, calorie, id_foodOfType
										from food
										order by name');
			while($datas = $query->fetch(PDO::FETCH_ASSOC)){
				$foods[] = new Food($datas);
			}
			return $foods;
		}

		public function update(Food $food){
			$query = $this->_db->prepare('update food
											set name= :name, calorie= :calorie, id_foodOfType= :id_foodOfType
											where id= :id');
			$query->bindValue(':name', $food->getName());
			$query->bindValue(':calorie', $food->getCalorie(), PDO::PARAM_INT);
			$query->bindValue(':id_foodOfType', $food->getId_FoodOfType(), PDO::PARAM_INT);
			$query->bindValue(':id', $food->getId(), PDO::PARAM_INT);
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