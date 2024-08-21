<?php

namespace App\Filament\Clusters\CMS\Resources\PostsResource\Pages;

use App\Filament\Clusters\CMS\Resources\PostsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
