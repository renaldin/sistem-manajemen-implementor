<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'              => CSRF::class,
        'toolbar'           => DebugToolbar::class,
        'honeypot'          => Honeypot::class,
        'invalidchars'      => InvalidChars::class,
        'secureheaders'     => SecureHeaders::class,
        'filterleader'      => \App\Filters\FilterLeader::class,
        'filterkaryawan'    => \App\Filters\FilterKaryawan::class,
        'filterhrd'         => \App\Filters\FilterHRD::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'filterleader' => [
                'except' => [
                    '/',
                    '/login',
                    '/cek_login',
                ]
            ],
        ],
        'after' => [
            'filterleader' => [
                'except' => [
                    '/',
                    '/dashboard',
                    '/m_employe_assesment',
                    '/m_employe_assesment/*',
                    '/m_work_position',
                    '/m_work_position/*',
                    '/m_live_location',
                    '/m_live_location/*',
                    '/m_task_management',
                    '/m_task_management/*',
                ]
            ],
            'filterkaryawan' => [
                'except' => [
                    '/',
                    '/liveLocation',
                    '/liveLocation/*',
                    '/task_management',
                    '/task_management/*',
                ]
            ],
            'filterhrd' => [
                'except' => [
                    '/',
                    '/hrd',
                    '/hrd/*',
                ]
            ],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
