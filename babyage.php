<?php
/*
Plugin Name: Baby Age
Plugin URI: http://zgia.net/?p=5
Description: Show baby's age in page.
Version: 0.4
Author: zGia!
Author URI: http://zgia.net/
*/

define('CURRENTDIR', dirname(__FILE__));

// Make string
function babyage()
{
    // System config
    require_once(CURRENTDIR . '/config.php');

    // Prepare vars
    $bornMonthLeftDays = intval(date('t', mktime(0, 0 , 0, $bornMonth, $bornDay, $bornYear))) - $bornDay;
    $bornYearLeftMonths = 12 -$bornMonth ;

    // Baby age
    $age_year = 0;
    $age_month = 0;
    $age_day = 0;

    // Output string
    $baby_age_str = "";

    // Process
    $today = getdate(time() + TIMEZONE * 60 * 60);
    if ($today['year'] >= $bornYear)
    {
        // 2008-8-18 or 2008-7-17 or 2008-7-18 or 2008-8-17
        if ($today['mon'] >= $bornMonth and $today['mday'] >= $bornDay)
        {
            $age_year = $today['year'] - $bornYear;
            $age_month = $today['mon'] - $bornMonth;
            $age_day = $today['mday'] - $bornDay;
        }
        // 2008-8-15 or 2008-7-15
        else if ($today['mon'] >= $bornMonth and $today['mday'] < $bornDay)
        {
            $age_day = $bornMonthLeftDays + $today['mday'];
            // 2008-8-15
            if ($today['mon'] > $bornMonth)
            {
                $age_year = $today['year'] - $bornYear;
                $age_month = $today['mon'] - $bornMonth - 1;
            }
            // 2008-7-15
            else if ($today['mon'] = $bornMonth)
            {
                $age_year = $today['year'] - $bornYear - 1;
                $age_month = 11;
            }
        }
        // 2008-6-18 or 2008-6-17
        else if ($today['mon'] < $bornMonth and $today['mday'] >= $bornDay)
        {
            $age_year = $today['year'] - $bornYear - 1;
            $age_month = $bornYearLeftMonths + $today['mon'];
            $age_day = $today['mday'] - $bornDay;
        }
        // 2008-6-15
        else if ($today['mon'] < $bornMonth and $today['mday'] < $bornDay)
        {
            $age_year = $today['year'] - $bornYear - 1;
            $age_month = $bornYearLeftMonths + $today['mon'] - 1;
            $age_day = $bornMonthLeftDays + $today['mday'];
        }

        if ($age_year ==0 and $age_month == 0 and $age_day == 0)
        {
            $baby_age_str = $lang['birthday'];
        }
        else
        {
            $baby_age_str = $lang['babyage'];
            if ($age_year)
            {
                $baby_age_str .= $age_year . $lang['yearsold'];
            }
            if ($age_month)
            {
                $baby_age_str .= $age_month . $lang['month'];
            }
            if ($age_day)
            {
                $baby_age_str .= $lang['and'] . $age_day . $lang['day'];
            }
            $baby_age_str .= $lang['fullstop'];

            if ($age_month == 0 and $age_day == 0)
            {
                $baby_age_str .= $lang['happybirthday'];
            }
        }

    }
    echo "\n<script type=\"text/javascript\">\n<!--\n    document.getElementById('babyage').innerHTML = \"<img src='wp-includes/images/smilies/icon_idea.gif' border='0'> $baby_age_str\";\n//-->\n</script>\n\n";
}


function addBabyAgeDiv()
{
	echo '<div id="babyage" style="padding-bottom:10px;"></div>';
}

// Do it.
add_action('before_sidebar', 'addBabyAgeDiv');
add_action('wp_footer', 'babyage');
?>