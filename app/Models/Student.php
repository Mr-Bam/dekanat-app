<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    public static array $fieldsToSort = [
        "first_name" => "First Name",
        "last_name" => "Last Name",
        "course" => "Course",
        "rating" => "Rating",
        "dormitory_id" => "Dormitory",
    ];

    public static array $defaultFilters = [
        "sort" => "rating",
        "dir" => "desc",
    ];

    public function dormitory(): BelongsTo
    {
        return $this->belongsTo(Dormitory::class);
    }

    public function scholarships(): HasMany
    {
        return $this->hasMany(StudentScholarship::class);
    }

    public static function getByParams(array $params): Collection
    {
        $whereFields = ['filter_rating' => 'rating', 'filter_dormitory' => 'dormitory_id'];
        $where = [];

        foreach ($params as $field => $value) {
            if (\array_key_exists($field, $whereFields) && $value) {
                $where[] = [$whereFields[$field], '=', $value];
            }
        }

        return Student::query()->where($where)->orderBy($params['sort'], $params['dir'])->get();
    }
}
