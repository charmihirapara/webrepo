<?php
# Here Traits is Used for Multiple Inheritance
# Multiple Inheritance not Possible By Class
# One Class only can Extends by one Class

#Example 1
trait t1
{
	public $var1;
	public function t_getData($var1)
	{
		$this->var1 = $var1;
	}
}
trait t2
{
	public $var2;
	public function t_a_getData($var2)
	{
		$this->var2 = $var2;
	}
}
class t1t2
{
	use t1,t2;
	public function t_setData()
	{
		return $this->var1;
	}
	public function t_a_setData()
	{
		return $this->var2;
	}
}



#Example 1

$obj = new t1t2();
$obj->t_getData("Here we are Using Traits t1");
$obj->t_a_getData("Here we are Using Traits t2");
echo $obj->t_setData();
echo "<br>".$obj->t_a_setData();
echo "<pre>";
print_r($obj);
echo "</pre>";




?>
