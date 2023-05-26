<?php

namespace App\Filament\Resources\UserResource\Pages;

use Carbon\Carbon;
use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    /**
     * Create email_verified_at and hash the password before store in the Database
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['email_verified_at'] = Carbon::now();
        // $data['password'] = bcrypt($data['password']);
        return $data;
    }


    /**
     * When create a new user automatically add admin role in admin dashboard
     */
    protected function handleRecordCreation(array $data): Model
    {
        $user = parent::handleRecordCreation($data);
        $user->assignRole('admin');

        return $user;
    }
}
