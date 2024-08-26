<?php

namespace App\Filament\Clusters\CMS\Resources\ParceirosPageResource\Pages;

use App\Filament\Clusters\CMS\Resources\ParceirosPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateParceirosPage extends CreateRecord
{
    protected static string $resource = ParceirosPageResource::class;
}
