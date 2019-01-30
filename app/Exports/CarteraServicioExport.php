<?php

namespace App\Exports;

use App\Models\CarteraServicio;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CarteraServicioExport implements  WithEvents
{
	// use Exportable;
	protected $id;
	protected $celdas = 'A1:H1';
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
    {
        $this->id = $id; 
    }

    // public function collection() // FromCollection,
    // {
    //     return CarteraServicio::_getServiciosPorId($this->id);
    // }

    static function filas()
    {
    	return CarteraServicio::all();
    }

    // public function headings(): array // WithHeadings,
    // {
    //     return [
    //         'CARTERA DE SERVICIO'
    //     ];
    // }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

            	$event->sheet->getDelegate()->setWidth('A', 100);
            	$cartera_servicio = CarteraServicio::findOrFail($this->id);
            	$event->sheet->getDelegate()->setCellValue('A1', 'FORMATO DE CARTERA DE SERVICIO DE ' . $cartera_servicio->mes . " " . $cartera_servicio->anio);
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(20);
                $event->sheet->getDelegate()->mergeCells($this->celdas);

                $event->sheet->getDelegate()->getStyle('A1')->getAlignment()->applyFromArray(
				    array('horizontal' => 'center')
				);


                $aux = "";
				$especialidades = CarteraServicio::_getEspecialidadesPorId($this->id);
				foreach ($especialidades as $value) {
					$aux .= $value->nombre . "  ";
				}
				$event->sheet->getDelegate()->setCellValue('A20', $aux);
            },
        ];
    }
}
