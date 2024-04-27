<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $note_pickets
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NotePicketFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|NotePicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotePicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotePicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotePicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotePicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotePicket whereNotePickets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotePicket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NotePicket extends Model
{
    use HasFactory;
}
