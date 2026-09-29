<!DOCTYPE html>
<html
    lang="<?= htmlspecialchars(Language::get()) ?>"
    dir="<?= htmlspecialchars(Language::direction()) ?>">

<head>

    <meta charset="UTF-8">

    <title>
        <?= __('global_stock_details') ?>
        -
        <?= htmlspecialchars($item->name) ?>
    </title>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <style>

        @import url(
            'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap'
        );

        html,
        body {

            font-family:
                "Tajawal",
                "Cairo",
                Arial,
                sans-serif;

            font-size: 13px;

            color: #000;
        }

        body {

            margin: 0;

            padding: 30px;
        }

        .document {

            max-width: 900px;

            margin: 0 auto;
        }

        /* COMPANY HEADER */

        .header {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            margin-bottom: 25px;

            gap: 40px;
        }

        .company-block {

            flex: 1;

            line-height: 1.5;
        }

        .company-logo {

            margin-bottom: 8px;
        }

        .company-logo img {

            max-width: 180px;

            max-height: 70px;

            width: auto;

            height: auto;

            object-fit: contain;
        }

        .company-name {

            font-size: 24px;

            font-weight: 700;

            line-height: 1.3;
        }

        .company-detail {

            font-size: 12px;

            color: #444;

            margin-top: 3px;
        }

        /* REPORT HEADER */

        .report-block {

            width: 280px;

            text-align: left;
        }

        html[dir="rtl"] .report-block {

            text-align: right;
        }

        .report-title {

            font-size: 22px;

            font-weight: 700;

            line-height: 1.3;

            margin-bottom: 10px;
        }

        .report-meta {

            font-size: 12px;

            margin-bottom: 4px;
        }

        /* ITEM INFORMATION */

        .info-box {

            border: 1px solid #ccc;

            padding: 12px 15px;

            margin-bottom: 20px;
        }

        .section-title {

            font-size: 14px;

            font-weight: 700;

            margin-bottom: 10px;

            padding-bottom: 6px;

            border-bottom: 1px solid #ddd;
        }

        .info-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 7px 30px;
        }

        .label {

            font-weight: 700;
        }

        /* SUMMARY */

        .summary {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;

            margin-bottom: 20px;
        }

        .summary-item {

            border: 1px solid #ccc;

            padding: 10px;

            text-align: center;
        }

        .summary-label {

            display: block;

            font-size: 11px;

            color: #555;

            margin-bottom: 5px;
        }

        .summary-value {

            display: block;

            font-size: 18px;

            font-weight: 700;
        }

        /* MATCH STATUS */

        .match-status {

            border: 1px solid #ccc;

            padding: 10px;

            margin-bottom: 20px;

            font-weight: 700;
        }

        .match {

            background: #f2f2f2;
        }

        .mismatch {

            background: #f2f2f2;
        }

        /* TABLE */

        table {

            width: 100%;

            border-collapse: collapse;
        }

        th,
        td {

            border: 1px solid #999;

            padding: 7px 8px;

            vertical-align: middle;
        }

        th {

            background: #eee;

            font-weight: 700;
        }

        .text-end {

            text-align: right;
        }

        .total-row th,
        .total-row td {

            font-weight: 700;
        }

        /* FOOTER */

        .footer {

            margin-top: 25px;

            font-size: 11px;

            color: #555;
        }

        /* ACTIONS */

        .actions {

            margin-bottom: 20px;
        }

        .actions button {

            padding: 7px 14px;

            margin-right: 5px;

            cursor: pointer;
        }

        /* PRINT */

        @media print {

            @page {

                size: A4;

                margin: 10mm;
            }

            body {

                padding: 0;
            }

            .actions {

                display: none;
            }

            .document {

                max-width: none;
            }

            .location-table thead {

                display: table-header-group;
            }

            .location-table tr {

                page-break-inside: avoid;
            }
        }

    </style>

</head>

<body>

<div class="actions">

    <button onclick="window.print()">

        <?= __('print') ?>

    </button>

    <button onclick="window.close()">

        <?= __('close') ?>

    </button>

</div>


<div class="document">


    <!-- COMPANY HEADER -->

    <div class="header">

        <div class="company-block">

            <?php if (!empty($settings->logo)): ?>

                <div class="company-logo">

                    <img
                        src="<?= URLROOT ?>/<?= htmlspecialchars(
                            ltrim($settings->logo, '/')
                        ) ?>"
                        alt="<?= htmlspecialchars(
                            $settings->company_name ?? 'Company'
                        ) ?>">

                </div>

            <?php endif; ?>


            <div class="company-name">

                <?= htmlspecialchars(
                    $settings->company_name ?? 'Company Name'
                ) ?>

            </div>


            <?php if (!empty($settings->address)): ?>

                <div class="company-detail">

                    <?= nl2br(
                        htmlspecialchars($settings->address)
                    ) ?>

                </div>

            <?php endif; ?>


            <?php if (!empty($settings->contacts)): ?>

                <div class="company-detail">

                    <?= nl2br(
                        htmlspecialchars($settings->contacts)
                    ) ?>

                </div>

            <?php endif; ?>

        </div>


        <!-- REPORT TITLE -->

        <div class="report-block">

            <div class="report-title">

                <?= __('global_stock_details') ?>

            </div>


            <div class="report-meta">

                <?= __('printed') ?>:

                <span dir="ltr">

                    <?= date('Y-m-d H:i') ?>

                </span>

            </div>

        </div>

    </div>


    <!-- ITEM INFORMATION -->

    <div class="info-box">

        <div class="section-title">

            <?= __('item') ?>

        </div>


        <div class="info-grid">

            <div>

                <span class="label">
                    <?= __('item') ?>:
                </span>

                <?= htmlspecialchars($item->name) ?>

            </div>


            <div>

                <span class="label">
                    <?= __('sku') ?>:
                </span>

                <?= htmlspecialchars($item->sku) ?>

            </div>


            <div>

                <span class="label">
                    <?= __('category') ?>:
                </span>

                <?= htmlspecialchars(
                    $item->category ?? '-'
                ) ?>

            </div>


            <div>

                <span class="label">
                    <?= __('base_unit') ?>:
                </span>

                <?= htmlspecialchars(
                    $item->unit_name ?? 'unit'
                ) ?>

            </div>

        </div>

    </div>


    <!-- SUMMARY -->

    <div class="summary">

        <div class="summary-item">

            <span class="summary-label">

                <?= __('system_quantity') ?>

            </span>

            <span class="summary-value">

                <?= number_format(
                    $system_qty,
                    2
                ) ?>

            </span>

        </div>


        <div class="summary-item">

            <span class="summary-label">

                <?= __('location_physical_total') ?>

            </span>

            <span class="summary-value">

                <?= number_format(
                    $location_total,
                    2
                ) ?>

            </span>

        </div>


        <div class="summary-item">

            <span class="summary-label">

                <?= __('active_reserved') ?>

            </span>

            <span class="summary-value">

                <?= number_format(
                    $reserved_qty,
                    2
                ) ?>

            </span>

        </div>


        <div class="summary-item">

            <span class="summary-label">

                <?= __('total_available') ?>

            </span>

            <span class="summary-value">

                <?= number_format(
                    $available_qty,
                    2
                ) ?>

            </span>

        </div>

    </div>


    <!-- MATCH STATUS -->

    <?php

    $difference =
        $system_qty -
        $location_total;

    ?>

    <div class="match-status <?= abs($difference) < 0.01
        ? 'match'
        : 'mismatch'
    ?>">

        <?php if (abs($difference) < 0.01): ?>

            <?= __('stock_matched') ?>

            -

            <?= __('stock_quantity_matches_locations') ?>

        <?php else: ?>

            <?= __('stock_mismatch_detected') ?>

            -

            <?= __('difference') ?>:

            <?= number_format(
                abs($difference),
                2
            ) ?>

            <?= htmlspecialchars(
                $item->unit_name ?? ''
            ) ?>

        <?php endif; ?>

    </div>


    <!-- LOCATION DISTRIBUTION -->

    <div class="section-title">

        <?= __('location_stock_distribution') ?>

    </div>


    <table class="location-table">

        <thead>

            <tr>

                <th>
                    <?= __('location') ?>
                </th>

                <th class="text-end">
                    <?= __('physical_qty') ?>
                </th>

                <th class="text-end">
                    <?= __('reserved_qty') ?>
                </th>

                <th class="text-end">
                    <?= __('available_qty') ?>
                </th>

                <th>
                    <?= __('status') ?>
                </th>

            </tr>

        </thead>


        <tbody>

        <?php if (empty($locations)): ?>

            <tr>

                <td
                    colspan="5"
                    style="text-align:center;">

                    <?= __('no_location_stock_found') ?>

                </td>

            </tr>

        <?php else: ?>

            <?php foreach ($locations as $location): ?>

                <?php

                $physical =
                    (float)$location->physical_qty;

                $reserved =
                    (float)$location->reserved_qty;

                $available =
                    (float)$location->available_qty;

                ?>

                <tr>

                    <td>

                        <strong>

                            <?= htmlspecialchars(
                                $location->location_code
                            ) ?>

                        </strong>


                        <?php if (
                            !empty(
                                $location->location_name
                            )
                        ): ?>

                            -

                            <?= htmlspecialchars(
                                $location->location_name
                            ) ?>

                        <?php endif; ?>

                    </td>


                    <td class="text-end">

                        <?= number_format(
                            $physical,
                            2
                        ) ?>

                    </td>


                    <td class="text-end">

                        <?= number_format(
                            $reserved,
                            2
                        ) ?>

                    </td>


                    <td class="text-end">

                        <?= number_format(
                            $available,
                            2
                        ) ?>

                    </td>


                    <td>

                        <?php if ($physical <= 0): ?>

                            <?= __('out_of_stock') ?>

                        <?php elseif ($available <= 0): ?>

                            <?= __('fully_reserved') ?>

                        <?php elseif ($reserved > 0): ?>

                            <?= __('partially_reserved') ?>

                        <?php else: ?>

                            <?= __('available') ?>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

        </tbody>


        <tfoot>

            <tr class="total-row">

                <th>
                    <?= __('total') ?>
                </th>

                <th class="text-end">

                    <?= number_format(
                        $location_total,
                        2
                    ) ?>

                </th>

                <th class="text-end">

                    <?= number_format(
                        $reserved_qty,
                        2
                    ) ?>

                </th>

                <th class="text-end">

                    <?= number_format(
                        $available_qty,
                        2
                    ) ?>

                </th>

                <th></th>

            </tr>

        </tfoot>

    </table>


    <!-- FOOTER -->

    <div class="footer">

        <?= __('printed') ?>:

        <span dir="ltr">

            <?= date('Y-m-d H:i') ?>

        </span>

    </div>

</div>

</body>

</html>