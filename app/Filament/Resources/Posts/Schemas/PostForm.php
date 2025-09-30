<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Create a post')->schema([
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('slug')
                        ->required(),
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required(),
                    ColorPicker::make('color')
                        ->required(),
                    MarkdownEditor::make('content')
                        ->columnSpanFull(),

                    Toggle::make('published')
                        ->required(),
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('image')->schema([
                        FileUpload::make('thumbnail')->disk('public')->directory('thumbnails'),
                    ]),
                    Section::make('meta')->schema([
                        TagsInput::make('tags'),
                    ]),
                ]),
            ])->columns(3);
    }
}
