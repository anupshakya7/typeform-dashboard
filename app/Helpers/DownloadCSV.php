<?php
namespace App\Helpers;

class DownloadCSV{
    public static function downloadCSV($allData,$filename){
        $fp = fopen($filename,'w+');
        $heading = array_keys($allData[0]->attributesToArray());

        fputcsv($fp,$heading);

        foreach($allData as $row){
            $itemsData = $row->attributesToArray();
            fputcsv($fp,$itemsData);
        }

        fclose($fp);
        $headers = array('Content-Type'=>'text/csv');

        return response()->download($filename,$filename,$headers);
    }
}

?>