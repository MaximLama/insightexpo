<?php
$arUrlRewrite=array (
  4 => 
  array (
    'CONDITION' => '#^/category/port/([^/]*$)#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/portfolio/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/([\\w,-]+)/([^/]*$)#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/portfolio/detail.php',
    'SORT' => 100,
  ),
);
