<?php 

abstract class mard
{
	var $name;
	var $surname;
	function __construct($a,$b)
	{
		$this->name = $a;
		$this->surname = $b;
	}
}

class school
{
	public $array_child = array();
	public $array_teacher = array();
	public $school_name,$address;
	function __construct($school_name,$address)
	{
		$this->school_name=$school_name;
		$this->address=$address;
	}
	public function add_child($child)
	{
			$this->array_child[]=$child;
	}
	public function add_teacher($teacher)
	{
			$this->array_teacher[]=$teacher;
	}
	public function show_teacher()
	{
		foreach($this->array_teacher as $value)
		{
			foreach($value as $param)
			{
				echo $param.' ';
			}
			echo '<br>';
		}
	}
	public function show_child()
	{
		foreach($this->array_child as $value)
		{
			foreach($value as $param)
			{
				echo $param.' ';
			}
			echo '<br>';
		}
	}

}

class teacher extends mard
{
	public $name,$surname,$subject;

	function __construct($a,$b,$subject)
	{
		parent::__construct($a,$b);
		$this->subject=$subject;
	}
}

class child extends mard
{
	public $rate;
	function __construct($a,$b,$rate)
	{
		parent::__construct($a,$b);
		$this->rate=$rate;
	}
}

$obj=new school('Shahumyan','Mashtoc');
$teacher1=new teacher("name1","surname1","subject1");
$teacher2=new teacher("name2","surname2","subject2");
$teacher3=new teacher("name3","surname3","subject3");

$obj->add_teacher($teacher1);
$obj->add_teacher($teacher2);
$obj->add_teacher($teacher3);

$child1=new child("name1","surname1","bavarar");
$child2=new child("name2","surname2","lav");
$child3=new child("name3","surname3","gerazanc");

$obj->add_child($child1);
$obj->add_child($child2);
$obj->add_child($child3);

$obj->show_child();



?>