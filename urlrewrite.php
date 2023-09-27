<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/video([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1&videoconf',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/news/topic/(\\d+)/page-(\\d+)$#',
    'RULE' => 'CATEGORY_ID=$1&PAGEN_1=$2',
    'ID' => '',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/news/topic/(\\d+)/$#',
    'RULE' => 'CATEGORY_ID=$1',
    'ID' => '',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/news/page-(\\d+)/$#',
    'RULE' => 'PAGEN_1=$1',
    'ID' => '',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/news/(\\d+)/$#',
    'RULE' => 'ELEMENT_ID=$1',
    'ID' => '',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/about/$#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/about/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '{^/news/$}',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '{$/^}',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/index.php',
    'SORT' => 100,
  ),
);
