<?php

namespace App\Filament\Clusters\CMS\Resources\PostsResource\Pages;

use App\Filament\Clusters\CMS\Resources\PostsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePosts extends CreateRecord
{
    protected static string $resource = PostsResource::class;
}
