<?php
#Example 1
class c1
{
	public $var1;
	public function getData()
	{
		echo "This is Parent Class Access by Child Class";
	}
}
class c2 extends c1
{
	public function setData()
	{
		echo "<br>"."This is Child Class";
	}
}

#Example 2
class c11
{
	private $p_var1;
	public function getDatap($p_var1)
	{
		$this->p_var1 = $p_var1;
	}
	public function setDatap()
        {
                return $this->p_var1;
        }


}
class c22 extends c11
{
	#public function setDatap()
	#{
	#	return $this->p_var1;
	#}
	#Gives Fatal Error : Cannot Access Private Varible
}

#Example 3
class p_c1
{
	protected $p_data;
	public function p_getData($p_data)
	{
		$this->p_data = $p_data;
	}
}
class p_c2 extends p_c1
{
	public function p_setData()
	{
		return $this->p_data;
	}
}

#Exampl 4
abstract class a_c1
{
	public $data;
	public function a_getData($data)
	{
		$this->data = $data;
	}
	abstract function a_setData();
}
class a_c2 extends a_c1
{
	public function a_setData()
	{
		return $this->data;
	}
}

#Example 5
interface i1
{
	public function i_getData($i_data);
}
class i_c1 implements i1
{
	public $i_data;
	public function i_getData($i_data)
	{
		$this->i_data = $i_data;
	}
}
class i_c2 extends i_c1
{
	public function i_setData()
        {
                return $this->i_data;
        }

}

#Example 1
$obj = new c2();
$obj->getData();
$obj->setData();
echo "<br>"."<br>Access Public Member Function & Public Member Varible<br>";
echo "<pre>";
print_r($obj);
echo "</pre>";

#Example 2
$objj = new c22();
$objj->getDatap("Access Private Varible Using Public Function");
echo $objj->setDatap();
echo "<pre>";
print_r($objj);
echo "</pre>";

#Example 3
$p_obj = new p_c2();
$p_obj->p_getData("Access Protected Variable Using Public Function In Inheritance");
echo $p_obj->p_setData();
echo "<pre>";
print_r($p_obj);
echo "</pre>";

#Example 4
$a_obj = new a_c2();
$a_obj->a_getData("Pass the Parameter & get This data Using Abstract Method");
echo $a_obj->a_setData();
echo "<pre>";
print_r($a_obj);
echo "</pre>";

#Example 5
$i_obj = new i_c2();
$i_obj->i_getData("Acces the Interface Method which is Implement By Class");
echo $i_obj->i_setData();
echo "<pre>";
print_r($i_obj);
echo "</pre>";
