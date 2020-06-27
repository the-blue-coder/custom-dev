<?php

namespace CustomDev\App\WPCrons;

class CronIntervals
{
    public function __construct()
    {
        //15 minutes
        add_filter('cron_schedules', [$this, 'fifteenMinutes']);
    }



    public function fifteenMinutes($schedules)
    {
        $schedules['every_fifteen_minutes'] = array(
            'interval' => 900,
            'display'  => __('Every 15 Minutes', CUSTOM_DEV_TEXTDOMAIN)
        );

        return $schedules;
    }
}

new CronIntervals();