<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRecommendation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'job_id', 'job_title', 'company', 'location', 'match_score'];
}
