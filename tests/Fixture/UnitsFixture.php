<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UnitsFixture
 *
 */
class UnitsFixture extends TestFixture
{

/**
 * Fields
 *
 * @var array
 */
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
        'engine' => 'InnoDB', 'collation' => 'utf8_hungarian_ci'
        ],
    ];

/**
 * Records
 *
 * @var array
 */
    public $records = [
        [
            'id' => 1,
            'name' => 'Unit 1'
        ],
        [
            'id' => 2,
            'name' => 'Unit 2'
        ],
    ];
}
