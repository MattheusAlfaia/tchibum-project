<?php



use App\Models\Home;
use Statickidz\GoogleTranslate;


$tr = new GoogleTranslate();


return [

     // home
    'errors' => $tr->translate('en', 'pt', $home->titulo_principal), PHP_EOL,

];

