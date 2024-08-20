<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class CMS extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'CMS - Gestão de Conteúdos';

    protected static ?int $navigationSort = 1;
}
