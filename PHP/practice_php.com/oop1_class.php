<?php
class c1
{
	public $data;
        public function __construct()
        {
                echo "Congartulation ! Class c1 Constructor is fired";
	}
	public function getData($data)
	{
		$this->data = $data;	
	}
	public function setData()
	{
		return $this->data;
	}
}
$obj = new c1();
$obj->getData("Charmi Hirapara is Here..");
echo "<br>".$obj->setData();
echo "<pre>";
print_r($obj);
echo "</pre>";

?>

