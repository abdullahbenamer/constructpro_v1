<?php

class DBExceptionHelper
{
    public static function message(Throwable $e): string
    {
        if ($e instanceof PDOException) {

            $errorCode = $e->errorInfo[1] ?? null;

            switch ($errorCode) {

                // MySQL: Duplicate entry / UNIQUE constraint
                case 1062:
                    return __('db_duplicate_entry');

                // MySQL: Cannot delete or update parent row
                // because it is referenced by another table
                case 1451:
                    return __('db_cannot_delete_in_use');

                // MySQL: Cannot add or update child row
                // because referenced record does not exist
                case 1452:
                    return __('db_invalid_reference');

                // MySQL: Data too long for column
                case 1406:
                    return __('db_data_too_long');

                // MySQL: Column cannot be NULL
                case 1048:
                    return __('db_required_field_missing');

                default:
                    return __('db_operation_failed');
            }
        }

        return __('operation_failed');
    }
}