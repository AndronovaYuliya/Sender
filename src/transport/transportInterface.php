<?php
    require dirname(__FILE__,2).'/template/Templater.php';
    $bgcolor = '#CCFFCC';
	$text = 'Тест класса!'; 
	$title = 'ТЕСТ!'; 
	$tpl = new Templater('./../template/view','.tpl'); // создали объект, задали каталог и расширение
    $tpl -> load('body'); // загрузили шаблон
	//указали какие переменные преобразовать, они должны быть заданы зарание
	$tpl -> vars('body',array('text','title','bgcolor'));
	echo $tpl -> out('body'); //вывели шаблон 
?>