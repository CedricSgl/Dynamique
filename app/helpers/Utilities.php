<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Date;

class Utilities
{
    public static function getUpdateTimeDiff($updateTime)
    {
        $currentDateTime = Date::now();
        //$updateTime = Date::createFromTimestamp($updateTime);

        $diff = $updateTime->diff($currentDateTime);
        //echo $diff->format('%R%a days');

        //dd($updateTime);
        $minutes = $diff->i;
        $hours = $diff->h;
        $days = $diff->d;
        $month = $diff->m;
        $year = $diff->y;

        $output = '';
        if($year > 0){

        }elseif($month > 0){
            $output .= 'modifié il y a ' . $month . ' mois';
        }elseif ($days > 0) {
            $output .= 'modifié il y a ' . $days . ' jours';
        }elseif ($hours > 0) {
            $output .= 'modifié il y a ' . $hours . ' heures';
        }elseif ($minutes > 0) {
            $output .= 'modifié il y a ' . $minutes . ' minutes';
        }   else {
            $output .= 'modifié juste maintenant';
        }

        if ($minutes <= 1) {
            $output = 'modifié il y a quelques secondes';
        }

        return $output;
    }
}
