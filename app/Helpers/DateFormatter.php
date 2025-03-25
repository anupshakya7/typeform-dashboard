<?php
namespace App\Helpers;

use Carbon\Carbon;

class DateFormatter{
    public static function formatDateRange($dateRange){
        if($dateRange){
            $dates = explode(' to ',$dateRange);

            $startDate = Carbon::createFromFormat('d-m-Y',$dates[0]);
            $endDate = Carbon::createFromFormat('d-m-Y',$dates[1]);
    
    
            $formattedStartDate = $startDate->format('d M, Y');
            $formattedEndDate = $endDate->format('d M, Y');
    
            return $formattedStartDate.' to '.$formattedEndDate;
        }
    }
}
?>