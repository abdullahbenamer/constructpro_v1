<?php

class PriorityHelper
{
    public static function all()
    {
        return [
            'LOW',
            'NORMAL',
            'HIGH',
            'URGENT',
            'CRITICAL'
        ];
    }

    public static function badge($priority)
    {
        switch (strtoupper($priority)) {

            case 'LOW':
                return 'bg-success';

            case 'NORMAL':
                return 'bg-primary';

            case 'HIGH':
                return 'bg-warning text-dark';

            case 'URGENT':
                return 'bg-danger';

            case 'CRITICAL':
                return 'bg-dark';

            default:
                return 'bg-secondary';
        }
    }
}

