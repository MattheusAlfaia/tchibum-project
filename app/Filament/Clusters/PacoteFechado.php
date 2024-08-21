<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class PacoteFechado extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Pacotes Fechados';
}
