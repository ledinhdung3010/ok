<?php
// app/Models/CompanyIntro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyIntro extends Model
{
    use HasFactory;

    // Bảng tương ứng với model này
    protected $table = 'company_intro';

    // Các trường mà bạn muốn cho phép gán hàng loạt (mass assignable)
    protected $fillable = ['description'];

    // Nếu bạn không sử dụng timestamp (created_at, updated_at), bỏ dòng này
    public $timestamps = true;
}
