<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    use HasFactory;

    const PRIORITY = [
        'Low' => 'Baixa',
        'Medium' => 'Média',
        'High' => 'Alta',
    ];

    const STATUS = [
        'Open' => 'Aberto',
        'Closed' => 'Fechado',
        'Archived' => 'Arquivado',
    ];

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'is_resolved',
        'comment',
        'assigned_by',
        'assigned_to',
    ];

    public function assignedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class);
    }
}
