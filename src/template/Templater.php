<?php
class Templater 
{
	public $data = []; 	// переменная для шаблонов
	public $root = '.'; 		// каталог для шаблонов
	public $ext = '.tpl'; 		// расширение для шаблонов
	public $da_vr = [];	// переменная для преобразованых шаблонов

	// Эта функция выполниется сразу после создания класса, поэтому при создании надо
	// указывать директорию и расширения шаблонов (см. ниже). 
	function template($dir,$ext)
	{
		if(is_dir($dir))
		{
			$this -> root = $dir;
		}
		else
		{
			die('Ошибка! '.$dir.' - это не директория!');
		}
		$this -> ext = $ext;
	}

	//загрузить шаблон
	//В этой функции мы считали шаблон через fread и запихнули его в две переменных:
	// da_vr и data. При загрузке шаблона надо указывать имя шаблона без расширения
	function load($name)
	{
		$nn = $name;
		echo $nn;
		$dir = $this -> root;
		$ext = $this -> ext;
		$name = $dir.'/'.$name.$ext;
		if(!is_file($name)) 
		{
			die('Ошибка <b>'.$name.'</b> - это не файл!');
		}
		$fp = fopen($name,'r');
		$data = fread($fp,filesize($name));
		fclose($fp);
		
		$this -> data[$nn] = $data;
		$this -> da_vr[$nn] = $data;
	}

	//Преобразовываем переменные
	function vars($nm, $vars = [])
	{
		$data = $this -> data[$nm];
		var_dump($vars);
        $tmp=[];
        foreach ($vars as $id=>$var)
        {
            $tmp[$id]=$var;
            $data=str_replace('{'.$vars[$id].'}',$tmp[$id],$data);
        }
		/*while(list($id,$var) = $vars)
		{
		    echo 5;
			//global $$vars[$id];
			//$data=str_replace('{'.$vars[$id].'}',$$vars[$id],$data);
		}*/
		$this -> da_vr[$nm] = $data;
	}

	//вывод шаблона
	function out($name)
	{
		$ret = $this -> da_vr[$name];
		$this -> da_vr[$name] = $this -> data[$name];
		return $ret;
	}
}
