<?php

class MyFormatter extends CLocalizedFormatter {

    // Localize to Yes everything evaluable as true; No for everything else
    public function formatBooleanString($value)
    {
        if ($value) return Yii::t('app','Yes');
        return Yii::t('app','No');
    }

    public function formatDate($value) 
    {
        $this->dateFormat = "medium";
        return parent::formatDate($value);
    }

    public function formatDateShort($value) 
    {
        $this->dateFormat = "short";
        return parent::formatDate($value);
    }

    public function formatDateLong($value) 
    {
        $this->dateFormat = "long";
        return parent::formatDate($value);
    }

    public function formatDateFull($value) 
    {
        $this->dateFormat = "full";
        return parent::formatDate($value);
    }

    public function formatTime($value) 
    {
        $this->timeFormat = "medium";
        return parent::formatTime($value);
    }

    public function formatTimeShort($value) 
    {
        $this->timeFormat = "short";
        return parent::formatTime($value);
    }

    public function formatTimeLong($value) 
    {
        $this->timeFormat = "long";
        return parent::formatTime($value);
    }

    public function formatTimeFull($value) 
    {
        $this->timeFormat = "full";
        return parent::formatTime($value);
    }

}
