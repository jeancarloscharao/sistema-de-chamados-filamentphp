<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Chamados';

    protected static ?string $pluralLabel = 'Chamados';

    protected static ?string $label = 'Chamado';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Título'),

                Forms\Components\Select::make('status')
                    ->options(self::$model::STATUS)
                    ->label('Status'),

                Forms\Components\Select::make('priority')
                    ->options(self::$model::PRIORITY)
                    ->label('Prioridade'),

                Forms\Components\Select::make('assigned_to')
                    ->relationship('assignedTo', 'name')
                    ->required()
                    ->label('Atribuído a'),

                Forms\Components\Checkbox::make('is_resolved')
                    ->label('Resolvido'),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Descrição'),

                Forms\Components\Textarea::make('comment')
                    ->required()
                    ->label('Comentários'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->label('Título')->description(fn (Ticket $record): string => $record->description),
                Tables\Columns\BadgeColumn::make('status')->enum(self::$model::STATUS) ->label('Status'),
                Tables\Columns\BadgeColumn::make('priority')->enum(self::$model::PRIORITY) ->label('Prioridade'),
                Tables\Columns\TextColumn::make('assignedTo.name')->label('Atríbuido a'),
                Tables\Columns\TextColumn::make('assignedBy.name')->label('Criado por'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CategoriesRelationManager::class,
            RelationManagers\LabelsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
