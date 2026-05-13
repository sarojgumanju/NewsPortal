<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Article Information')
                ->schema([
                    Select::make('categories')
                        ->multiple()
                        ->relationship('categories', 'title')
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('slug')
                        ->required(),
                    TextInput::make('author')
                        ->required(),
                    RichEditor::make('description')
                        ->columnSpanFull()
                        ->required(),
                    FileUpload::make('image')
                        ->image()
                        ->required(),
                    
                ])->columnSpanFull()->columns(2),
                // Toggle::make('status')
                //     ->required(),
                Section::make([
                    TextInput::make('meta_title')
                        ->default(null),
                    Textarea::make('meta_keyword')
                        ->default(null)
                        ->columnSpanFull(),
                    Textarea::make('meta_description')
                        ->default(null)
                        ->columnSpanFull(),
                ])->columnSpanFull()->label('Meta Information'),
            ]);
    }
}
