<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function test(){
        set_time_limit(0);
        $directory = public_path('data');
        $subfolders = scandir($directory);
        $batchSize = 500;
        $sleepTime = 500000;

        $chunks = array_chunk($subfolders, $batchSize);
        foreach ($chunks as $batch) {
            foreach ($batch as $folder) {
                if ($folder !== '.' && $folder !== '..' && is_dir($directory . '/' . $folder)) {
                    $newdirectory = $directory . '/' . $folder;
                    $m3u8Files = glob($newdirectory . '/*.m3u8');
                    foreach ($m3u8Files as $file) {
                        $dataM3u8 = file_get_contents($file);
                        $dataM3u8 = str_replace('sf16-scmcdn-sg.ibytedtos.com', 'p16-sg.tiktokcdn.com', $dataM3u8);
                        if(!file_exists(public_path('data1/'.$folder)))
                            mkdir(public_path('data1/'.$folder));
                        $newPath = str_replace('data', 'data1', $file);
                        file_put_contents($newPath, $dataM3u8);
                    }
                    $cmd = 'rm -rf '.$newdirectory;
                    system($cmd);
                    //echo 'rm -rf '. $folder . '</br>';
                }
            }
            echo "success \n";
            usleep($sleepTime);
        }

    }
}
