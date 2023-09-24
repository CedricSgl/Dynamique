<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Date;

class Utilities
{
    public static function getUpdateTimeDiff($updateTime, $verb = 'modifié')
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
            if($year == 1){
                $output .= $verb . ' il y a ' . $year . ' an';
            }else{
                $output .= $verb . ' il y a ' . $year . ' ans';
            }

        }elseif($month > 0){
            $output .= $verb . ' il y a ' . $month . ' mois';
        }elseif ($days > 0) {
            $output .= $verb . ' il y a ' . $days . ' jours';
        }elseif ($hours > 0) {
            $output .= $verb . ' il y a ' . $hours . ' heures';
        }elseif ($minutes > 0) {
            $output .= $verb . ' il y a ' . $minutes . ' minutes';
        }   else {
            $output .= $verb . ' il y a quelques instant';
        }

        return $output;
    }
}
