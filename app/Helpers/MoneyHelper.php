
<?php

class MoneyHelper
{
    /**
     * Format a monetary amount for display.
     * Negative values use the format -(1,250.00).
     */
    public static function format($amount, int $decimals = 2): string
    {
        $amount = (float) ($amount ?? 0);

        if ($amount < 0) {
            return '-(' . number_format(abs($amount), $decimals, '.', ',') . ')';
        }

        return number_format($amount, $decimals, '.', ',');
    }

    /**
     * Return a Bootstrap text class for monetary amounts.
     */
    public static function cssClass($amount): string
    {
        return (float) ($amount ?? 0) < 0
            ? 'text-danger'
            : 'text-body';
    }

    /**
     * Render a formatted monetary amount with its appropriate colour.
     */
    public static function display($amount, int $decimals = 2): string
    {
        $class = self::cssClass($amount);
        $formatted = self::format($amount, $decimals);

        return '<span class="' . $class . '">'
            . $formatted
            . '</span>';
    }
}
