<?php
	class Food {
		private $_id;
		private $_name;
		private $_calorie;
		private $_id_foodOfType;

		public function  __construct (array $datas){
			$this->hydrate($datas);
		}

		public function hydrate(array $datas){
			foreach ($datas as $key => $data) {
				$method= 'set'.ucfirst($key);
				if (method_exists($this, $method)){
					$this->$method($data);
				}
			}
		}

	
	    /**
	     * @return mixed
	     */
	    public function getId()
	    {
	        return $this->_id;
	    }

	    /**
	     * @param mixed $_id
	     *
	     * @return self
	     */
	    public function setId($id)
	    {
	        $this->_id = $id;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getName()
	    {
	        return $this->_name;
	    }

	    /**
	     * @param mixed $_name
	     *
	     * @return self
	     */
	    public function setName($name)
	    {
	        $this->_name = $name;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCalorie()
	    {
	        return $this->_calorie;
	    }

	    /**
	     * @param mixed $_calorie
	     *
	     * @return self
	     */
	    public function setCalorie($calorie)
	    {
	        $this->_calorie = $calorie;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getId_FoodOfType()
	    {
	        return $this->_id_foodOfType;
	    }

	    /**
	     * @param mixed $_id_foodOfType
	     *
	     * @return self
	     */
	    public function setId_foodOfType($id_foodOfType)
	    {
	        $this->_id_foodOfType = $id_foodOfType;

	        return $this;
	    }
	}
?>