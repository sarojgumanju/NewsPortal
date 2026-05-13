<?php

namespace App\Filament\Resources\Advertises\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AdvertiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('company_name')
                        ->required(),
                    TextInput::make('contact')
                        ->required(),
                    TextInput::make('redirect_link')
                        ->required(),
                    DatePicker::make('expire_date')
                        ->required(),
                    FileUpload::make('banner')
                        ->required(),
                ])->columnSpanFull()->columns(2),       
            ]);
    }
}
