<?php declare(strict_types=1);

namespace App\Models\Contracts;

interface ItemTypeContract
{
    /**
     * Define item types key 'bolpen'
     * 
     * @var string
     */
    const TYPE_BALLPOINT = 'bolpen';

    /**
     * Define item types key 'papan'
     * 
     * @var string
     */
    const TYPE_BOARD = 'papan';

    /**
     * Define item types key 'cutter'
     * 
     * @var string
     */
    const TYPE_CUTTER = 'cutter';

    /**
     * Define item types key 'isi cutter'
     * 
     * @var string
     */
    const TYPE_CUTTER_FILL = 'isi cutter';

    /**
     * Define item types key 'lakban'
     * 
     * @var string
     */
    const TYPE_DUCT_TAPE = 'lakban';

    /**
     * Define item types key 'penghapus'
     * 
     * @var string
     */
    const TYPE_ERASERS = 'penghapus';

    /**
     * Define item types key 'stabilo'
     * 
     * @var string
     */
    const TYPE_HIGHLIGHTER = 'stabilo';

    /**
     * Define item types key 'pensil'
     * 
     * @var string
     */
    const TYPE_PENCILS = 'pensil';

    /**
     * Define item types key 'spidol'
     * 
     * @var string
     */
    const TYPE_MARKERS = 'spidol';

    /**
     * Define item types key 'kertas'
     * 
     * @var string
     */
    const TYPE_PAPER = 'kertas';

    /**
     * Define item types key 'tipe X'
     * 
     * @var string
     */
    const TYPE_TYPE_X = 'tipe X';

    /**
     * Define item types key 'penggaris'
     * 
     * @var string
     */
    const TYPE_RULERS = 'penggaris';

    /**
     * Define item types key 'steples'
     * 
     * @var string
     */
    const TYPE_STAPLES = 'steples';

    /**
     * Define item types key 'isi steples'
     * 
     * @var string
     */
    const TYPE_STAPLES_FILL = 'isi steples';
}