<?php

namespace CustomDev\ThirdParties;

use \DateTime;

class DateTimeFrench extends DateTime 
{
    public function format($format)
    {
        $englishDays   = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $frenchDays    = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
        $englishMonths = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $frenchMonths  = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        
        return str_replace($englishMonths, $frenchMonths, str_replace($englishDays, $frenchDays, parent::format($format)));
    }
}