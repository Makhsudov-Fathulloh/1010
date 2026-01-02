<?php

namespace App\Services;

use App\Exports\DataExport;
use App\Exports\MultiSheetExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    public static function export($query, $fileName, $columns = [], $totals = [])
    {
        $data = $query->get(); // FULL DATA, paginated emas

        if ($data->isEmpty()) {
            return Excel::download(new MultiSheetExport($query, $columns, $totals), $fileName . '.xlsx');
        }

        return Excel::download(new MultiSheetExport($query, $columns, $totals), $fileName . '.xlsx');
    }
}
