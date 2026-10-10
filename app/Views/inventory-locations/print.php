<?php

/**
 * LOCATION INVENTORY PRINT
 *
 * Standalone print view.
 * Follows the same ConstructPro print format used by:
 * - purchase-orders/print.php
 * - project-costs/ledger_report.php
 * - suppliers/ledger_report.php
 */

$language  = $_SESSION['language'] ?? 'en';

$direction = ($language === 'ar') ? 'rtl' : 'ltr';

$companyName    = $settings->company_name ?? '';

$companyAddress = $settings->company_address ?? '';

$companyPhone   = $settings->company_phone ?? '';

$companyEmail   = $settings->company_email ?? '';

$companyLogo    = $settings->company_logo ?? '';

$printedDate = date('Y-m-d H:i');

?>

<!DOCTYPE html>

<html

    lang="<?= htmlspecialchars($language) ?>"

    dir="<?= $direction ?>"

>

<head>

    <meta charset="UTF-8">

    <title>

        <?= __('inventory') ?>

        -

        <?= htmlspecialchars($location->name ?? '') ?>

    </title>
    <meta

        name="viewport"

        content="width=device-width, initial-scale=1"

    >
    <link

        href="https://fonts.googleapis.com/css2?family=Cairo:wght\@400;600;700&family=Tajawal:wght\@400;500;700&display=swap"

        rel="stylesheet"

    >
    <style>
        * {

            box-sizing: border-box;

        }
        body {

            margin: 0;

            padding: 0;

            background: #fff;

            color: #000;

            font-family: 'Tajawal', 'Cairo', Arial, sans-serif;

            font-size: 13px;

        }
        .print-container {

            width: 100%;

            max-width: 1200px;

            margin: 0 auto;

            padding: 25px;

        }
        /* --------------------------------------------------

           COMPANY HEADER

        -------------------------------------------------- */
        .company-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 2px solid #000;

            padding-bottom: 12px;

            margin-bottom: 20px;

        }
        .company-logo {

            max-height: 70px;

            max-width: 180px;

            object-fit: contain;

        }
        .company-info {

            text-align: center;

            flex: 1;

            margin: 0 20px;

        }
        .company-name {

            font-size: 22px;

            font-weight: 700;

            margin-bottom: 5px;

        }
        .company-details {

            font-size: 11px;

            line-height: 1.6;

        }
        .company-header-spacer {

            width: 180px;

        }
        /* --------------------------------------------------

           DOCUMENT HEADER

        -------------------------------------------------- */
        .document-header {

            text-align: center;

            margin-bottom: 20px;

        }
        .document-title {

            font-size: 22px;

            font-weight: 700;

            margin-bottom: 8px;

            text-transform: uppercase;

        }
        .document-meta {

            font-size: 11px;

            color: #555;

        }
        /* --------------------------------------------------

           LOCATION INFORMATION

        -------------------------------------------------- */
        .location-info {

            border: 1px solid #999;

            padding: 12px 15px;

            margin-bottom: 15px;

        }
        .location-info-grid {

            display: flex;

            justify-content: space-between;

            gap: 20px;

        }
        .location-info-item {

            flex: 1;

        }
        .location-info-label {

            display: block;

            font-size: 10px;

            color: #555;

            margin-bottom: 3px;

        }
        .location-info-value {

            display: block;

            font-size: 14px;

            font-weight: 700;

        }
        /* --------------------------------------------------

           SUMMARY

        -------------------------------------------------- */
        .summary {

            display: flex;

            justify-content: space-between;

            margin-bottom: 15px;

            border: 1px solid #ccc;

            padding: 10px 15px;

        }
        .summary-item {

            text-align: center;

            flex: 1;

        }
        .summary-label {

            display: block;

            font-size: 10px;

            color: #555;

            margin-bottom: 3px;

        }
        .summary-value {

            display: block;

            font-size: 15px;

            font-weight: 700;

        }
        /* --------------------------------------------------

           TABLE

        -------------------------------------------------- */
        .inventory-table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 10px;

        }
        .inventory-table th,

        .inventory-table td {

            border: 1px solid #999;

            padding: 7px 6px;

            vertical-align: middle;

        }
        .inventory-table th {

            background: #f2f2f2;

            font-weight: 700;

            text-align: center;

            white-space: nowrap;

        }
        .inventory-table td {

            font-size: 11px;

        }
        .text-center {

            text-align: center;

        }
        .text-right {

            text-align: right;

        }
        .text-left {

            text-align: left;

        }
        .status {

            font-weight: 600;

        }
        /* --------------------------------------------------

           PRINT ACTIONS

        -------------------------------------------------- */
        .actions {

            text-align: center;

            margin: 25px 0;

        }
        .actions button {

            border: none;

            padding: 8px 18px;

            margin: 0 4px;

            cursor: pointer;

            font-family: inherit;

            font-size: 13px;

            border-radius: 4px;

        }
        .btn-print {

            background: #212529;

            color: #fff;

        }
        .btn-close {

            background: #6c757d;

            color: #fff;

        }
        /* --------------------------------------------------

           FOOTER

        -------------------------------------------------- */
        .report-footer {

            margin-top: 20px;

            padding-top: 8px;

            border-top: 1px solid #999;

            font-size: 10px;

            color: #555;

            display: flex;

            justify-content: space-between;

        }
        /* --------------------------------------------------

           PRINT

        -------------------------------------------------- */
        @media print {
            @page {

                size: A4 landscape;

                margin: 10mm;

            }
            body {

                background: #fff;

                font-size: 10px;

            }
            .print-container {

                max-width: none;

                padding: 0;

            }
            .actions {

                display: none !important;

            }
            .inventory-table {

                page-break-inside: auto;

            }
            .inventory-table tr {

                page-break-inside: avoid;

                page-break-after: auto;

            }
            .inventory-table thead {

                display: table-header-group;

            }
            .inventory-table tfoot {

                display: table-footer-group;

            }
            .company-header,

            .document-header,

            .location-info,

            .summary {

                break-inside: avoid;

            }
            a {

                color: inherit;

                text-decoration: none;

            }

        }
    </style>
</head>
<body>
<div class="print-container">
    <!-- ==================================================

         COMPANY HEADER

    ================================================== -->
    <div class="company-header">
        <div>
            <?php if (!empty($companyLogo)): ?>
                <img

                    src="<?= URLROOT . '/' . ltrim($companyLogo, '/') ?>"

                    alt="<?= htmlspecialchars($companyName) ?>"

                    class="company-logo"

                >
            <?php endif; ?>
        </div>
        <div class="company-info">
            <div class="company-name">

                <?= htmlspecialchars($companyName) ?>

            </div>
            <div class="company-details">
                <?php if (!empty($companyAddress)): ?>
                    <?= htmlspecialchars($companyAddress) ?>
                <?php endif; ?>
                <?php if (!empty($companyPhone)): ?>
                    <br>

                    <?= htmlspecialchars($companyPhone) ?>
                <?php endif; ?>
                <?php if (!empty($companyEmail)): ?>
                    <br>

                    <?= htmlspecialchars($companyEmail) ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="company-header-spacer"></div>
    </div>    <!-- ==================================================

         DOCUMENT HEADER

    ================================================== -->
    <div class="document-header">
        <div class="document-title">

            <?= __('inventory') ?>

        </div>
        <div class="document-meta">
            <?= __('printed') ?>:

            <?= htmlspecialchars($printedDate) ?>
        </div>
    </div>    <!-- ==================================================

         LOCATION INFORMATION

    ================================================== -->
    <div class="location-info">
        <div class="location-info-grid">
            <div class="location-info-item">
                <span class="location-info-label">

                    <?= __('location') ?>

                </span>
                <span class="location-info-value">
                    <?= htmlspecialchars(

                        $location->name ?? ''

                    ) ?>
                </span>
            </div>            <div class="location-info-item">
                <span class="location-info-label">

                    <?= __('code') ?>

                </span>
                <span class="location-info-value">
                    <?= htmlspecialchars(

                        $location->code ?? ''

                    ) ?>
                </span>
            </div>            <div class="location-info-item">
                <span class="location-info-label">

                    <?= __('storekeeper') ?>

                </span>
                <span class="location-info-value">
                    <?= htmlspecialchars(

                        $location->storekeeper ?? '-'

                    ) ?>
                </span>
            </div>
        </div>
    </div>    <!-- ==================================================

         CALCULATE SUMMARY

    ================================================== -->
    <?php
    $totalItems = is_array($items) ? count($items) : 0;

    ?>    <!-- ==================================================

         SUMMARY

    ================================================== -->
    <div class="summary">

        <div class="summary-item">

            <span class="summary-label">
                <?= __('total_items') ?>
            </span>

            <span class="summary-value">
                <?= number_format($totalItems) ?>
            </span>

        </div>

    </div><!-- ==================================================

         LOCATION INVENTORY TABLE

    ================================================== -->
    <table class="inventory-table">
        <thead>
        <tr>
            <th>

                #

            </th>
            <th>                <?= __('item') ?>            </th>
            <th>

                <?= __('sku') ?>

            </th>
            <th>

                <?= __('physical_qty') ?>

            </th>
            <th>

                <?= __('uom') ?>

            </th>
            <th>

                <?= __('reserved_qty') ?>

            </th>
            <th>

                <?= __('available_qty') ?>

            </th>
            <th>

                <?= __('status') ?>

            </th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $index => $item): ?>
                <?php
                $physical = (float)(

                    $item->physical_qty

                    ?? $item->quantity

                    ?? 0

                );                $reserved = (float)(
                    $item->reserved_quantity
                    ?? 0
                );

                $available = (float)(
                    $item->available_quantity
                    ?? ($physical - $reserved)
                );

                ?>
                <tr>
                    <td class="text-center">

                        <?= $index + 1 ?>

                    </td>                    <td>
                        <?= htmlspecialchars(

                            $item->item_name

                            ?? $item->name

                            ?? ''

                        ) ?>
                    </td>                    <td class="text-center">
                        <?= htmlspecialchars(

                            $item->sku

                            ?? ''

                        ) ?>
                    </td>                    <td class="text-right">
                        <?= number_format(

                            $physical,

                            2

                        ) ?>
                    </td>                    <td class="text-center">
                        <?= htmlspecialchars(

                            $item->uom

                            ?? $item->unit_name

                            ?? $item->unit

                            ?? ''

                        ) ?>
                    </td>                    <td class="text-right">
                        <?= number_format(

                            $reserved,

                            2

                        ) ?>
                    </td>                    <td class="text-right">
                        <?= number_format(

                            $available,

                            2

                        ) ?>
                    </td>                    <td class="text-center status">
                        <?= htmlspecialchars(

                            $item->status

                            ?? ''

                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td

                    colspan="8"

                    class="text-center"

                >

                    <?= __('no_inventory_items_found') ?>

                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>    <!-- ==================================================

         FOOTER

    ================================================== -->
    <div class="report-footer">
        <div>
            <?= htmlspecialchars(

                $companyName

            ) ?>
        </div>
        <div>
            <?= __('printed') ?>:

            <?= htmlspecialchars(

                $printedDate

            ) ?>
        </div>
    </div>    <!-- ==================================================

         ACTION BUTTONS

    ================================================== -->
    <div class="actions">
        <button

            type="button"

            class="btn-print"

            onclick="window.print()"

        >

            <?= __('print') ?>

        </button>        <button

            type="button"

            class="btn-close"

            onclick="window.close()"

        >

            <?= __('close') ?>

        </button>
    </div>
</div>
</body>
</html>