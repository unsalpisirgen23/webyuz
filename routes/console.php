<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



Artisan::command('create:c{name}{extends?}',function ($name,$extends=null){
            $name = ucwords($name);
            $file = realpath(".")."/app/Constants/".$name.".php";
            $open = fopen($file,'w');
            $html = '<?php'.PHP_EOL.PHP_EOL;
            $html .= "namespace App\Constants; ".PHP_EOL.PHP_EOL;
            $html .= "class ".$name;
            $html .= " ".($extends != null ? "extends ".ucwords($extends)."{}" : "{}").PHP_EOL.PHP_EOL;
               $result =  fwrite($open,$html);
               if ($result){
                   $this->comment("Success");
               }else{
                   $this->comment("Error");
               }
               fclose($open);
})->purpose("create class");



