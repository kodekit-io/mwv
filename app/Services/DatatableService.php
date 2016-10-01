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

    public function generateOutput($data, $media, $totalRow, $currentPage = 0, $offset = 25)
    {
        $columns = $this->getColumnsByMedia($media);
        return [
            "draw"            => $currentPage,
            "recordsTotal"    => intval( $totalRow ),
            "recordsFiltered" => intval( $totalRow ),
            "data"            => $this->parse($columns, $data)
        ];
    }

    private function getColumnsByMedia($media)
    {
        $handlerName = $media . 'Columns';
        return $this->$handlerName();
    }

    private function twitterColumns()
    {
        return [
            ['db' => 'screeName', 'dt' => '0'],
            ['db' => 'text', 'dt' => '1'],
            ['db' => 'sentimentId', 'dt' => '2']
        ];
    }

    private function videoColumns()
    {
        return [
            ['db' => 'author', 'dt' => '0'],
            ['db' => 'videoTitle', 'dt' => '1'],
            ['db' => 'sentimentId', 'dt' => '2']
        ];
    }

}