<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobReport extends Model
{
    public function hasReportedProject($projectId)
    {
        return $this->jobReports()->where('project_id', $projectId)->exists();
    }

    public function jobReports()
    {
        return $this->hasMany(JobReport::class);
    }
}
