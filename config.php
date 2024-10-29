<?php

// Language file
if (defined('WPLANG') && WPLANG == 'zh_CN')
{
	require_once(CURRENTDIR . '/language_cn.php');
}
else
{
	require_once(CURRENTDIR . '/language_en.php');
}

// Time Zone
define('TIMEZONE', get_option('gmt_offset'));

// Date on birth
$bornYear = 2007;
$bornMonth = 7;
$bornDay = 17;

?>