<?php

namespace App\Imports;

use App\Models\Customer\Waste;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerWasteImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Add conditional checks to ensure essential data is not null
        if (empty($row['customer']) || empty($row['site']) || empty($row['year']) || empty($row['month']) || empty($row['waste_type'])) {
            return null;  // Skip this row if any crucial field is empty
        }

        return new Waste([
            'customer_name'       => $row['customer'],
            'site'                => $row['site'],
            'year'                => $row['year'],
            'month'               => $row['month'],
            'waste_type'          => $row['waste_type'],
            'estimated_quantity'  => $row['estimated_quantity_kg'] ?? 0, // Provide default value if null
            'actual_quantity'     => $row['actual_quantity_kg'] ?? 0, // Provide default value if null
        ]);
    }
}
