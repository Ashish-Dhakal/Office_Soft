<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoles;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements HasAvatar, FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles, HasPanelShield;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'salutation',
        'name',
        'email',
        'password',
        'avatar',
        'address_1',
        'address_2',
        'city',
        'state',
        'country',
        'zip',
        'phone',
        'is_active',
        'gender',
        'receive_emails'
    ];
    public function getFilamentAvatarUrl(): string
    {
        return $this->avatar 
            ? Storage::url($this->avatar) 
            : asset('assets/suffix-image/slack.png');
    }
    
    


    
    // public function hasRole(string $role): bool
    // {
    //     return $this->role->value === $role;
    // }

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    // public function contracts(): HasManyThrough
    // {
    //     return $this->hasManyThrough(Contract::class, Client::class);
    // }
}
