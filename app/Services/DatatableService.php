<?php

namespace App;


use Illuminate\Support\Facades\Log;

class DatatableService
{
    function parse($columns, $datas) {
        $out = [];

        foreach ($datas as $data) {
            $row = [];
            for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
                $column = $columns[$j];

                // Is there a formatter?
                if ( isset( $column['formatter'] ) ) {
                    $row[ $column['dt'] ] = $column['formatter']( $data->$column['db'], $data );
                }
                else {
                    $colName = $columns[$j]['db'];
                    $row[ $column['dt'] ] = $data->$colName;
                }
            }

            $out[] = $row;
        }

        return $out;
    }

    public function generateOutput($data, $columns, $totalRow, $currentPage = 0, $offset = 25)
    {
        return [
            "draw"            => $currentPage,
            "recordsTotal"    => intval( $totalRow ),
            "recordsFiltered" => intval( $totalRow ),
            "data"            => $this->parse($columns, $data)
        ];
    }

}