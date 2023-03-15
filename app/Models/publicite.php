<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class publicite extends Model implements HasMedia
{
    use HasFactory,
    SoftDeletes,
        InteractsWithMedia;
        
        protected $fillable=[
            'title',
            'section_id'
        ];
        
        public function section(): BelongsTo
        {
            return $this->belongsTo(Section::class, 'section_id');
        }
}
