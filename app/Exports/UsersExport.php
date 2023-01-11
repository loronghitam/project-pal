<?php

namespace App\Exports;

use App\Models\Donate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery, WithHeadings
{
    protected $awal;
    protected $akhir;
    protected $kategory;

    function __construct($awal, $akhir, $kategory)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
        $this->kategory = $kategory;
    }

    public function array($kategery): array
    {
        return $this->kategory;
    }


    /**
     * @return Collection
     */
    public function query()
    {
        return Donate::join('programs', 'donates.program_id', 'programs.id')
            ->whereBetween('programs.created_at', [$this->awal, $this->akhir])
            ->WhereIn('programs.title', $this->kategory)
            ->select(
                'donates.created_at',
                'donates.name',
                'donates.email',
                'donates.phone',
                'donates.rekening',
                'donates.amount',
                'programs.title');
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama',
            'Email',
            'Phone',
            'Rekening',
            'Jumlah',
            'Nama Program',
        ];
    }

}
