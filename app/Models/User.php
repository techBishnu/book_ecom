<?php

namespace App\Models;

use App\Models\UserDetail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function userDetail(){
        return $this->belongsTo(UserDetail::class);
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function removeRole(string $roleName): bool
    // {
    //     $role = Role::where('name', $roleName)->first();
    //     if (!$role) {
    //         return false;
    //     }
    //     $result = $this->roles()->detach($role->id);
    //     return $result > 0;
    // }
    // /**
    //  * The roles that belong to the user.
    //  */
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
    public function removeRole($role)
    {
        $this->roles()->detach($this->getStoredRole($role));

        $this->load('roles');

        $this->forgetCachedPermissions();

        return $this;
    }
}
