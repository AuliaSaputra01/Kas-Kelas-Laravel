<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    protected $fillable = ['npm', 'nama', 'no_hp'];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
