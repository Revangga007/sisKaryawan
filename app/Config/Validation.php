<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $kriteria = [
        'nama'  => 'required',
        'bobot' => 'required',
        'status'=> 'required'
    ];

    public $pegawai = [
        'nama'      => 'required',
        'jekel'     => 'required',
        'no_hp'     => 'required',
        'alamat'    => 'required',
        'username'  => 'required',
        'password'  => 'required'
    ];

    public $user = [
        'nama'      => 'required',
        'username'  => 'required',
        'password'  => 'required',
        'role'      => 'required',
    ];

    public $kriteria_errors = [
        'nama'  =>[
            'required'   => 'Nama kriteria harus diisi',
        ],
        'bobot'  =>[
            'required'   => 'Bobot kriteria harus diisi'
        ],
        'status'  =>[
            'required'   => 'Status kriteria harus diisi',
        ],
    ];

    public $pegawai_errors = [
        'nama'  =>[
            'required'   => 'Nama pegawai harus diisi',
        ],
        'jekel'  =>[
            'required'   => 'Jenis kelamin pegawai harus diisi',
        ],
        'no_hp'  =>[
            'required'   => 'No.handphone pegawai harus diisi',
        ],
        'alamat'  =>[
            'required'   => 'Alamat pegawai harus diisi',
        ],
        'username'=>[
            'required'   => 'Username pegawai harus diisi',
        ],
        'password'=>[
            'required'   => 'Password pegawai harus diisi',
        ],
    ];

    public $user_errors = [
        'nama'  =>[
            'required'   => 'Nama user harus diisi',
        ],
        'username'=>[
            'required'   => 'username user harus diisi',
        ],
        'password'=>[
            'required'   => 'Password user harus diisi',
        ],
        'role'=>[
            'required'   => 'Role user harus diisi',
        ]
    ];
}
