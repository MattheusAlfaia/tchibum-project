<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class CustomPacote extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Pacotes Personalizados';

    protected static ?int $navigationSort = 3;
}
