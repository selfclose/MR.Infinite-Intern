<?php
namespace Intern\SampleData\RealData;

use Intern\Model\CompanyType;

class CompanyTypeImport
{
    private $data = [
        [
            'id' => '1',
            'name' => 'กิจการเจ้าของคนเดียว',
            'name_eng' => '',
        ],
        [
            'id' => '2',
            'name' => 'ห้างหุ้นส่วน',
            'name_eng' => '',
        ],
        [
            'id' => '3',
            'name' => 'ห้างหุ้นส่วน',
            'name_eng' => '',
        ],
        [
            'id' => '4',
            'name' => 'บริษัทจำกัด',
            'name_eng' => '',
        ],
        [
            'id' => '5',
            'name' => 'บริษัทมหาชนจำกัด',
            'name_eng' => 'Limited',
        ],
        [
            'id' => '6',
            'name' => 'สหกรณ์',
            'name_eng' => '',
        ],
        [
            'id' => '7',
            'name' => 'รัฐวิสาหกิจ',
            'name_eng' => '',
        ],
        [
            'id' => '8',
            'name' => 'บริษัทข้ามชาติ',
            'name_eng' => '',
        ],
        [
            'id' => '9',
            'name' => 'กิจการแฟรนไชส์',
            'name_eng' => 'Franchise',
        ],
    ];

    function __construct()
    {
        iLog('--- Importing Company Type ---', true);
        foreach ($this->data as $record) {
            $type = new CompanyType();
            $type->setName(['th'=>$record['name'], 'en'=>$record['name_eng']]);
            $type->insertAction(true);
            iLog('* Inserted: '.$record['name']);
        }
    }
}
