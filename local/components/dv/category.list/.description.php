<?php
 if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
 $arComponentDescription = array(
"NAME" => GetMessage("Меню категорий"),
"DESCRIPTION" => GetMessage("Выводим меню категорий"),
"PATH" => array(
"ID" => "dv_components",
"CHILD" => array(
"ID" => "curdate",
"NAME" => "Меню категорий"
)));