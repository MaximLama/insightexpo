<?php
$arUrlRewrite=array (
  7 => 
  array (
    'CONDITION' => '#^/servisy/([\\w,-]+)/([^/]*$)#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/servisy/detail.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/en/category/port/([^/]*$)#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/en/portfolio/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/category/port/([^/]*$)#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/portfolio/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/en/([\\w,-]+)/([^/]*$)#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/en/portfolio/detail.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/([\\w,-]+)/([^/]*$)#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/portfolio/detail.php',
    'SORT' => 100,
  ),
);
