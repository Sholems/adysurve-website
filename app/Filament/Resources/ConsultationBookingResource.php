<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultationBookingResource\Pages;
use App\Models\ConsultationBooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConsultationBookingResource extends Resource
{
    protected static ?string $model = ConsultationBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Communication';

    protected static ?string $navigationLabel = 'Consultation Bookings';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Client Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->disabled(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->disabled(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->disabled(),
                        Forms\Components\TextInput::make('service_interest')
                            ->disabled(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Booking Details')
                    ->schema([
                        Forms\Components\DatePicker::make('preferred_date')
                            ->disabled(),
                        Forms\Components\TextInput::make('preferred_time')
                            ->disabled(),
                        Forms\Components\TextInput::make('meeting_mode')
                            ->disabled(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'confirmed' => 'Confirmed',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required(),
                        Forms\Components\Toggle::make('is_read')
                            ->label('Mark as read'),
                        Forms\Components\Textarea::make('notes')
                            ->disabled()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('preferred_date')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('service_interest')
                    ->label('Service')
                    ->searchable()
                    ->limit(28),
                Tables\Columns\TextColumn::make('preferred_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preferred_time')
                    ->label('Time')
                    ->sortable(),
                Tables\Columns\TextColumn::make('meeting_mode')
                    ->badge(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed' => 'success',
                        'completed' => 'gray',
                        'cancelled' => 'danger',
                        default => 'warning',
                    }),
                Tables\Columns\IconColumn::make('is_read')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\Filter::make('upcoming')
                    ->query(fn ($query) => $query->where('preferred_date', '>=', today())),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsultationBookings::route('/'),
            'edit' => Pages\EditConsultationBooking::route('/{record}/edit'),
        ];
    }
}
