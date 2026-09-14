<!DOCTYPE html>
<html
    lang="<?= htmlspecialchars(Language::get()) ?>"
    dir="<?= htmlspecialchars(Language::direction()) ?>">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>
        <?= __('project_financial_ledger_report') ?>
    </title>


    <!-- FONTS -->

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Tajawal:wght@300;400;500;700;800&display=swap"
        rel="stylesheet">


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            font-family: "Tajawal", "Roboto", Arial, sans-serif;
            font-size: 13px;
            line-height: 1.6;
            color: #000;
            margin: 0;
            padding: 30px;
        }


        html[dir="rtl"] body {
            font-family: "Tajawal", "Roboto", Arial, sans-serif;
        }


        .document {
            max-width: 1000px;
            margin: 0 auto;
        }


        /* =========================================
           COMPANY HEADER
        ========================================= */

        .company-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ccc;
        }


        .company-brand {
            flex: 1;
        }


        .company-logo {
            margin-bottom: 10px;
        }


        .company-logo img {
            max-width: 180px;
            max-height: 75px;
            width: auto;
            height: auto;
            object-fit: contain;
            display: block;
        }


        .company-name {
            font-size: 24px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 5px;
        }


        .company-detail {
            font-size: 12px;
            color: #444;
            line-height: 1.5;
            margin-top: 2px;
        }


        .report-heading {
            width: 300px;
            text-align: right;
        }


        html[dir="rtl"] .report-heading {
            text-align: left;
        }


        .report-title {
            font-size: 21px;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 7px;
        }


        .report-date {
            font-size: 12px;
            color: #555;
        }


        /* =========================================
           PROJECT INFORMATION
        ========================================= */

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }


        .info-table td {
            padding: 7px 9px;
            border: 1px solid #ccc;
            vertical-align: middle;
        }


        .info-label {
            width: 13%;
            font-weight: 700;
            background: #f2f2f2;
            white-space: nowrap;
        }


        .info-value {
            width: 37%;
        }


        /* =========================================
           SUMMARY
        ========================================= */

        .summary {
            border: 1px solid #bbb;
            padding: 13px 16px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: center;
        }


        .summary-item {
            flex: 1;
        }


        .summary-label {
            display: block;
            font-size: 11px;
            color: #555;
            margin-bottom: 3px;
        }


        .summary-value {
            font-size: 16px;
            font-weight: 700;
        }


        .balance-positive {
            font-weight: 700;
        }


        .balance-negative {
            font-weight: 700;
        }


        .credit {
            font-weight: 700;
        }


        .debit {
            font-weight: 700;
        }


        /* =========================================
           LEDGER TABLE
        ========================================= */

        .ledger-table {
            width: 100%;
            border-collapse: collapse;
        }


        .ledger-table th,
        .ledger-table td {
            border: 1px solid #999;
            padding: 7px 8px;
            vertical-align: middle;
            line-height: 1.5;
        }


        .ledger-table th {
            background: #eee;
            font-weight: 700;
            text-align: left;
        }


        html[dir="rtl"] .ledger-table th {
            text-align: right;
        }


        .ledger-table tbody tr:nth-child(even) {
            background-color: #f7f7f7;
        }


        .text-right {
            text-align: right;
        }


        html[dir="rtl"] .text-right {
            text-align: left;
        }


        .number {
            direction: ltr;
            text-align: right;
            white-space: nowrap;
        }


        html[dir="rtl"] .number {
            text-align: left;
        }


        .entry-type {
            white-space: nowrap;
            font-weight: 500;
        }


        .advance {
            font-weight: 700;
        }


        .cost {
            font-weight: 700;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
            font-size: 11px;
            color: #555;
        }


        /* =========================================
           PRINT
        ========================================= */

        @media print {

            @page {
                size: A4;
                margin: 10mm;
            }


            body {
                padding: 0;
            }


            .document {
                max-width: none;
            }


            .no-print {
                display: none !important;
            }


            .ledger-table thead {
                display: table-header-group;
            }


            .ledger-table tr {
                page-break-inside: avoid;
            }

        }

    </style>

</head>


<body>

<div class="document">


    <!-- =========================================
         COMPANY HEADER
    ========================================= -->

    <div class="company-header">


        <!-- COMPANY -->

        <div class="company-brand">


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

        <div class="report-heading">

            <div class="report-title">

                <?= __('project_financial_ledger_report') ?>

            </div>


            <div class="report-date">

                <?= __('printed') ?>:

                <span dir="ltr">

                    <?= date('Y-m-d H:i') ?>

                </span>

            </div>

        </div>


    </div>


    <!-- =========================================
         PROJECT INFORMATION
    ========================================= -->

    <table class="info-table">

        <tr>

            <td class="info-label">

                <?= __('project') ?>:

            </td>


            <td class="info-value">

                <strong>

                    <?= htmlspecialchars(
                        $project->title ?? '-'
                    ) ?>

                </strong>

            </td>


            <td class="info-label">

                <?= __('status') ?>:

            </td>


            <td class="info-value">

                <?= htmlspecialchars(
                    $project->status ?? '-'
                ) ?>

            </td>

        </tr>


        <tr>

            <td class="info-label">

                <?= __('customer') ?>:

            </td>


            <td class="info-value">

                <?= htmlspecialchars(
                    $project->customer_name ?? '-'
                ) ?>

            </td>


            <td class="info-label">

                <?= __('deadline') ?>:

            </td>


            <td class="info-value">

                <span dir="ltr">

                    <?= htmlspecialchars(
                        $project->deadline ?? '-'
                    ) ?>

                </span>

            </td>

        </tr>

    </table>


    <!-- =========================================
         FINANCIAL SUMMARY
    ========================================= -->

    <div class="summary">


        <!-- ADVANCES -->

        <div class="summary-item">

            <span class="summary-label">

                <?= __('total_advances') ?>

            </span>


            <span class="summary-value">

                <span dir="ltr">

                    <?= number_format(
                        (float)$summary->total_advances,
                        2
                    ) ?>

                </span>

            </span>

        </div>


        <!-- COSTS -->

        <div class="summary-item">

            <span class="summary-label">

                <?= __('total_costs') ?>

            </span>


            <span class="summary-value">

                <span dir="ltr">

                    <?= number_format(
                        (float)$summary->total_costs,
                        2
                    ) ?>

                </span>

            </span>

        </div>


        <!-- BALANCE -->

        <div class="summary-item">

            <span class="summary-label">

                <?= __('balance') ?>

            </span>


            <span class="summary-value
                <?= $summary->balance < 0
                    ? 'balance-negative'
                    : 'balance-positive'
                ?>">

                <span dir="ltr">

                    <?= number_format(
                        (float)$summary->balance,
                        2
                    ) ?>

                </span>

            </span>

        </div>


    </div>


    <!-- =========================================
         LEDGER
    ========================================= -->

    <table class="ledger-table">

        <thead>

            <tr>

                <th>
                    <?= __('date') ?>
                </th>

                <th>
                    <?= __('type') ?>
                </th>

                <th>
                    <?= __('description') ?>
                </th>

                <th class="text-right">
                    <?= __('qty') ?>
                </th>

                <th class="text-right">
                    <?= __('debit') ?>
                </th>

                <th class="text-right">
                    <?= __('credit') ?>
                </th>

                <th class="text-right">
                    <?= __('balance') ?>
                </th>

            </tr>

        </thead>


        <tbody>

            <?php foreach ($ledger as $row): ?>

                <tr>


                    <!-- DATE -->

                    <td>

                        <span dir="ltr">

                            <?= date(
                                'Y-m-d',
                                strtotime($row->created_at)
                            ) ?>

                        </span>

                    </td>


                    <!-- TYPE -->

                    <td class="entry-type">

                        <?php if (
                            $row->entry_type === 'advance'
                        ): ?>

                            <span class="advance">

                                <?= __('advance') ?>

                            </span>

                        <?php else: ?>

                            <span class="cost">

                                <?= __('cost') ?>

                            </span>

                        <?php endif; ?>

                    </td>


                    <!-- DESCRIPTION -->

                    <td>

                        <?= htmlspecialchars(
                            $row->description ?? ''
                        ) ?>

                    </td>


                    <!-- QTY -->

                    <td class="number">

                        <?= !empty($row->quantity)

                            ? number_format(
                                (float)$row->quantity,
                                2
                            )

                            : '-' ?>

                    </td>


                    <!-- DEBIT -->

                    <td class="number">

                        <?= number_format(
                            (float)$row->debit,
                            2
                        ) ?>

                    </td>


                    <!-- CREDIT -->

                    <td class="number">

                        <?= number_format(
                            (float)$row->credit,
                            2
                        ) ?>

                    </td>


                    <!-- BALANCE -->

                    <?php

                    $balanceClass =
                        ($row->balance_after < 0)
                            ? 'balance-negative'
                            : 'balance-positive';

                    ?>


                    <td
                        class="number <?= $balanceClass ?>">

                        <?= number_format(
                            (float)$row->balance_after,
                            2
                        ) ?>

                    </td>


                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>


    <!-- =========================================
         FOOTER
    ========================================= -->

    <div class="footer">

        <?= __('printed') ?>:

        <span dir="ltr">

            <?= date('Y-m-d H:i') ?>

        </span>

    </div>


</div>


<!--
<script>
    window.onload = function () {
        window.print();
    };
</script>
-->

</body>

</html>