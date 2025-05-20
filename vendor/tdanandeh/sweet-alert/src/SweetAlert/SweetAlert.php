<?php

namespace Tdanandeh\SweetAlert;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Tdanandeh\SweetAlert\SweetAlertNotifier message(string $text = '', $title = null, $icon = null)
 * @method static \Tdanandeh\SweetAlert\SweetAlertNotifier basic(string $text, string $title)
 * @method static \Tdanandeh\SweetAlert\SweetAlertNotifier info(string $text, string $title = '')
 * @method static \Tdanandeh\SweetAlert\SweetAlertNotifier success(string $text, string $title = '')
 * @method static \Tdanandeh\SweetAlert\SweetAlertNotifier error(string $text, string $title = '')
 * @method static \Tdanandeh\SweetAlert\SweetAlertNotifier warning(string $text, string $title = '')
 */
class SweetAlert extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tdanandeh.sweet-alert';
    }
}
