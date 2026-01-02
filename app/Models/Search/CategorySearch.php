<?php

namespace App\Models\Search;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\AlphabetConverter;
use App\Services\DateFilterService;
use Illuminate\Support\Facades\Session;

class CategorySearch
{
    protected $dateFilter;
    public function __construct(DateFilterService $dateFilter)
    {
        $this->dateFilter = $dateFilter;
    }

    public function search(Request $request)
    {
        $filters = $request->get('filters', []);
        $query = Category::query();

        if (!empty($filters['id'])) {
            $query->where('id', $filters['id']);
        }

        if (!empty($filters['parent_id'])) {
            $query->where('parent_id', $filters['parent_id']);
        }

        if (!empty($filters['title'])) {
            $search = mb_strtolower($filters['title'], 'UTF-8');

            $variants = AlphabetConverter::convert($search);
            $latin = $variants['latin'];
            $cyrillic = $variants['cyrillic'];

            $query->where(function ($q) use ($latin, $cyrillic, $search) {
                $q->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"]) // Asl holati (Ruscha bo'lsa ruscha)
                    ->orWhereRaw('LOWER(title) LIKE ?', ["%{$latin}%"]) // Lotincha varianti
                    ->orWhereRaw('LOWER(title) LIKE ?', ["%{$cyrillic}%"]); // Kirillcha varianti
            });
        }

        if (!empty($filters['subtitle'])) {
            $query->whereRaw('LOWER(subtitle) LIKE ?', ['%' . strtolower($filters['subtitle']) . '%']);
        }

        if (!empty($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

        // Sanadan-sanagacha filter
        $errors = $this->dateFilter->applyDateToFilters($query, $filters);
        Session::flash('date_format_errors', $errors);

        // 🔥 Default sort (sort parametri yo‘q bo‘lsa)
        if (!$request->has('sort')) {
            $query->orderBy('id');
        }

        return $query;
    }
}
