<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];

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

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }


    function storyTraining()
    {
        return $this->hasOne(MyStoryTraining::class);
    }

    function learningPathModals()
    {
        return $this->hasMany(LearningPathModal::class);
    }
    function productions()
    {
        return $this->hasMany(Production::class);
    }
    function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    function learningPaths()
    {
        return $this->belongsToMany(LearningPathModal::class, 'learning_path_users', 'user_id', 'path_id');
    }

    function rentedProduction()
    {
        return $this->hasOne(RentedProduction::class);
    }

    function asyncSessions()
    {
        return $this->hasMany(AsyncSession::class);
    }


    function company()
    {
        return $this->belongsTo(Company::class);
    }
    function role()
    {
        return $this->belongsTo(Role::class);
    }
    function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }



    //scopes
    public function scopeByCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId);
    }

    public function scopeByTenant($query, $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }
}
