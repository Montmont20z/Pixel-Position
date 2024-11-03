<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Employer;
use App\Models\Tag;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        "title","salary", "location","schedule","url","feature","employer_id"
    ];
    
    public function employer(): BelongsTo {
        return $this->belongsTo(Employer::class); 
    }

    public function tag(string $name): void{
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag); // Pivot table
    }

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }
    
}
