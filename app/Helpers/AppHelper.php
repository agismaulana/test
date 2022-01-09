<?php
namespace App\Helpers;
 
class AppHelper {
    public static function get_first_name($name) {
        $arr_name = explode(' ', $name);
        return $arr_name[0];
    }

    public static function num_format($number) {
        $num_format = number_format($number, 0, ' ', '.');
        return $num_format;
    }

    public static function data_time($time) {
        $time_array = explode(' ', $time);
        $day_array = explode('-', $time_array[0]);
        $times = $day_array[0]."-".$day_array[1];
        return $times;
    }

    public static function time_format($time) {
        $time_array = explode(' ', $time);
        $day_array = explode('-', $time_array[0]);
        $hours_array = explode(':', $time_array[1]);
        $times = $day_array[2]."/".$day_array[1]."/".$day_array[0]." ".$hours_array[0].":".$hours_array[1];
        return $times;
    }
}