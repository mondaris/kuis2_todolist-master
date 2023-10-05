<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'status'];
    protected $table = 'task';
    public $timestamps = false;
}
