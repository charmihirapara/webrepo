<?php
class c1
{
	public $data;
	#public function __construct()
        #{
        #        echo "Constructor is Fire";
        #}
	public function __construct($data)
	{
		 $this->data = $data;
		 echo $this->data;
	}
	public function __destruct()
	{
		echo "<br>"."Destructor also fire";
	}
}
#$obj1 = new c1();
$obj2 = new c1("Parameter1");

?>
