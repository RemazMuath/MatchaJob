<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'category', // التصنيف التقني (مثل Software Dev او UI/UX)
        'company',
        'location',
        'description',
        'url',
        'source_id',
        'extracted_data'
    ];
    protected $casts = [ // same as json_decode() when importing the extracted date from the ai
        'extracted_data' => 'array',
    ];
    public function source(){
        return $this->belongsTo(Source::class);
    }
}
