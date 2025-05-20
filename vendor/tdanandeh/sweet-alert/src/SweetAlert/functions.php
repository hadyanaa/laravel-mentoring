<?php

if (! function_exists('alert')) {
    /**
     * Arrange for an alert message.
     *
     * @param string|null $message
     * @param string      $title
     *
     * @return \Tdanandeh\SweetAlert\SweetAlertNotifier
     */
    function alert($message = null, $title = '')
    {
        $notifier = app('tdanandeh.sweet-alert');

        if (! is_null($message)) {
            return $notifier->message($message, $title);
        }

        return $notifier;
    }
}
