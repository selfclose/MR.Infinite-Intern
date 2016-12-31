<?php
namespace Intern\SampleData\RealData;

use Intern\Model\Geo;

class GeoImport
{
    private $records = [
        'ภาคเหนือ', 'ภาคกลาง', 'ภาคตะวันออกเฉียงเหนือ', 'ภาคตะวันตก', 'ภาคตะวันออก', 'ภาคใต้'
    ];

    function __construct()
    {
       iLog('--- Importing GEO ---', true);
        foreach ($this->records as $record) {
            $geo = new Geo();

            $geo->setName($record);

            if ($geo->insertAction()) {
                iLog('* Inserted Geo: '.$record);
            }
        }
    }
}
