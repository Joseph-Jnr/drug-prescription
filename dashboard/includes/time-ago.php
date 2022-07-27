
<?php
function get_time_ago($time)
{
    $time_difference = time() - $time;
    if ($time_difference < 1) {
        return "Il y a moins d'une seconde";
    }
    $condition = array(
        12 * 30 * 24 * 60 * 60 => 'an',
        30 * 24 * 60 * 60 => 'moi',
        7 * 24 * 60 * 60 => 'semaine',
        24 * 60 * 60 => 'jour',
        60 * 60 => 'heure',
        60 => 'minute',
        1 => 'seconde'
    );
    foreach ($condition as $secs => $str) {
        $d = $time_difference / $secs;
        if ($d >= 1) {
            $t = round($d);
            return "Il y a " . $t . " " . $str . ($t > 1 ? "s" : "") . " ";
        }
    }
}
