<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                ColorPicker::make('color')
                    ->required(),
                FileUpload::make('thumbnail')->disk('public')->directory('thumbnails'),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                MarkdownEditor::make('content')
                    ->columnSpanFull(),
                TagsInput::make('tags'),
                Toggle::make('published')
                    ->required(),
            ]);
    }
}
