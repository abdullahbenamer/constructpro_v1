<!DOCTYPE html>
<html
    lang="<?= htmlspecialchars(Language::get()) ?>"
    dir="<?= htmlspecialchars(Language::direction()) ?>">

<head>

    <meta charset="UTF-8">

    <title>
        <?= __('purchase_order') ?> -
        <?= htmlspecialchars($po->po_number) ?>
    </title>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');

        html {
            font-family: "Tajawal", "Cairo", Arial, sans-serif;
        }

        body {
            font-family: "Tajawal", "Cairo", Arial, sans-serif;
            font-size: 13px;
            line-height: 1.6;
            color: #000;
            margin: 0;
            padding: 30px;
        }

        html[dir="rtl"] body {
            font-family: "Tajawal", "Cairo", Arial, sans-serif;
        }

        .document {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            gap: 40px;
        }

        /* COMPANY */

        .company-block {
            flex: 1;
            line-height: 1.5;
        }

        .company-logo {
    margin-bottom: 10px;
}

.company-logo img {
    max-width: 180px;
    max-height: 70px;
    width: auto;
    height: auto;
    object-fit: contain;
    display: block;
}

        .company-name {
            font-size: 24px;
            font-weight: 700;
            line-height: 1.3;
        }

        .document-title {
            font-size: 23px;
            font-weight: 700;
            line-height: 1.3;
        }

        .meta {
            margin-top: 7px;
            font-size: 12.5px;
            line-height: 1.5;
        }

            .company-detail {
            font-size: 12px;
            color: #444;
            margin-top: 3px;
        }

        /* PO INFORMATION */

        .po-block {
            width: 270px;
            text-align: left;
        }

        html[dir="rtl"] .po-block {
            text-align: right;
        }

        .document-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .po-block .meta {
            font-size: 12px;
            margin-bottom: 5px;
        }


        /* Supplier */
        .supplier-box {
            border: 1px solid #ccc;
            padding: 12px;
            margin-bottom: 25px;
        }

        .info-box {
            border: 1px solid #ccc;
            padding: 14px 16px;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 10px;
            padding-bottom: 6px;
            border-bottom: 1px solid #ddd;
        }

        .supplier-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 35px;
            row-gap: 7px;
        }

        .supplier-main {
            grid-column: 1 / -1;
        }

        .supplier-company {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .supplier-detail {
            font-size: 12.5px;
        }

        .supplier-detail .label {
            font-weight: 700;
            margin-right: 4px;
        }

        html[dir="rtl"] .supplier-detail .label {
            margin-right: 0;
            margin-left: 4px;
        }

        .supplier-address {
            grid-column: 1 / -1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* th,
        td {
            border: 1px solid #999;
            padding: 8px;
            vertical-align: top;
        }

        th {
            background: #eee;
        } */
        th,
        td {
            border: 1px solid #999;
            padding: 8px 9px;
            vertical-align: middle;
            line-height: 1.5;
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
            font-weight: bold;
        }

        .notes {
            margin-top: 25px;
            border: 1px solid #ccc;
            padding: 12px;
        }

        .signatures {
            margin-top: 70px;
            display: flex;
            justify-content: space-between;
        }

        .signature {
            width: 30%;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin-top: 45px;
            padding-top: 6px;
        }

        .actions {
            margin-bottom: 20px;
        }

        @media print {

            body {
                padding: 0;
            }

            .actions {
                display: none;
            }

            .document {
                max-width: none;
            }

        }
    </style>

</head>

<body>

    <div class="actions">

        <button onclick="window.print()">

            <?= __('print_purchase_order') ?>

        </button>

        <button onclick="window.close()">

            <?= __('close') ?>

        </button>

    </div>


    <div class="document">

        <div class="header">

      <!-- COMPANY INFORMATION -->

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


            <!-- PURCHASE ORDER INFORMATION -->

            <div class="po-block">

                <div class="document-title">

                    <?= __('purchase_order') ?>

                </div>


                <div class="meta">

                    <strong>
                        <?= __('po_number') ?>:
                    </strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($po->po_number) ?>
                    </span>
                </div>


                <div class="meta">

                    <strong>
                        <?= __('order_date') ?>:
                    </strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($po->order_date) ?>
                    </span>
                </div>


                <div class="meta">

                    <strong>
                        <?= __('expected_date') ?>:
                    </strong>

                    <?= htmlspecialchars(
                        $po->expected_date ?? '-'
                    ) ?>

                </div>

            </div>

        </div>


        <!-- SUPPLIER -->

        <div class="info-box supplier-box">

            <div class="section-title">
                <?= __('supplier') ?>
            </div>

            <div class="supplier-grid">

                <!-- COMPANY NAME -->

                <div class="supplier-main">

                    <div class="supplier-company">

                        <?= htmlspecialchars(
                            $po->supplier_name ?? '-'
                        ) ?>

                    </div>

                </div>


                <!-- CONTACT PERSON -->

                <?php if (!empty($po->supplier_contact_person)): ?>

                    <div class="supplier-detail">

                        <span class="label">
                            <?= __('contact_person') ?>:
                        </span>

                        <span>
                            <?= htmlspecialchars(
                                $po->supplier_contact_person
                            ) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <!-- PHONE -->

                <?php if (!empty($po->supplier_phone)): ?>

                    <div class="supplier-detail">

                        <span class="label">
                            <?= __('mobile') ?>:
                        </span>

                        <span dir="ltr">
                            <?= htmlspecialchars(
                                $po->supplier_phone
                            ) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <!-- EMAIL -->

                <?php if (!empty($po->supplier_email)): ?>

                    <div class="supplier-detail">

                        <span class="label">
                            <?= __('email') ?>:
                        </span>

                        <span dir="ltr">
                            <?= htmlspecialchars(
                                $po->supplier_email
                            ) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <!-- ADDRESS -->

                <?php if (!empty($po->supplier_address)): ?>

                    <div class="supplier-detail supplier-address">

                        <span class="label">
                            <?= __('address') ?>:
                        </span>

                        <span>
                            <?= nl2br(
                                htmlspecialchars(
                                    $po->supplier_address
                                )
                            ) ?>
                        </span>

                    </div>

                <?php endif; ?>

            </div>

        </div>


        <!-- DELIVERY / SHIP TO -->

        <div
            class="supplier-box"
            style="margin-bottom: 25px;">

            <strong>

                <?= __('delivery_ship_to') ?>

            </strong>


            <?php if (
                $po->delivery_method === 'DIRECT_TO_PROJECT_SITE'
            ): ?>

                <div style="margin-top: 10px;">

                    <div class="meta">

                        <strong>
                            <?= __('project') ?>:
                        </strong>

                        <?= htmlspecialchars(
                            $po->project_name ?? '-'
                        ) ?>

                    </div>


                    <div class="meta">

                        <strong>
                            <?= __('delivery_method') ?>:
                        </strong>

                        <?= __('direct_to_project_site') ?>

                    </div>


                    <div class="meta">

                        <strong>
                            <?= __('delivery_location') ?>:
                        </strong>

                        <br>

                        <?= nl2br(
                            htmlspecialchars(
                                $po->project_site_location ?? '-'
                            )
                        ) ?>

                    </div>


                    <div class="meta">

                        <strong>
                            <?= __('site_contact') ?>:
                        </strong>

                        <?= htmlspecialchars(
                            $po->project_manager_name ?? '-'
                        ) ?>

                    </div>


                    <div class="meta">

                        <strong>
                            <?= __('contact_number') ?>:
                        </strong>

                        <?= htmlspecialchars(
                            $po->project_manager_mobile ?? '-'
                        ) ?>

                    </div>

                </div>


            <?php elseif (
                $po->delivery_method === 'WAREHOUSE'
            ): ?>

                <div style="margin-top: 10px;">

                    <div class="meta">

                        <strong>
                            <?= __('warehouse') ?>:
                        </strong>

                        <?= htmlspecialchars(
                            $po->target_warehouse_code ?? ''
                        ) ?>

                        <?php if (
                            !empty($po->target_warehouse_name)
                        ): ?>

                            -

                            <?= htmlspecialchars(
                                $po->target_warehouse_name
                            ) ?>

                        <?php endif; ?>

                    </div>


                    <div class="meta">

                        <strong>
                            <?= __('delivery_method') ?>:
                        </strong>

                        <?= __('warehouse') ?>

                    </div>


                    <div class="meta">

                        <strong>
                            <?= __('delivery_location') ?>:
                        </strong>

                        <br>

                        <?= nl2br(
                            htmlspecialchars(
                                $po->target_warehouse_address ?? '-'
                            )
                        ) ?>

                    </div>


                    <?php if (
                        !empty($po->target_warehouse_mobile)
                    ): ?>

                        <div class="meta">

                            <strong>
                                <?= __('warehouse_contact_number') ?>:
                            </strong>

                            <?= htmlspecialchars(
                                $po->target_warehouse_mobile
                            ) ?>

                        </div>

                    <?php endif; ?>


                    <?php if (
                        !empty($po->storekeeper_name)
                    ): ?>

                        <div class="meta">

                            <strong>
                                <?= __('storekeeper') ?>:
                            </strong>

                            <?= htmlspecialchars(
                                $po->storekeeper_name
                            ) ?>

                            <?php if (
                                !empty($po->storekeeper_mobile)
                            ): ?>

                                -

                                <?= htmlspecialchars(
                                    $po->storekeeper_mobile
                                ) ?>

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                </div>


            <?php else: ?>

                <div style="margin-top: 10px;">

                    <?= __('delivery_information_not_specified') ?>

                </div>

            <?php endif; ?>

        </div>


        <!-- ITEMS -->

        <table>

            <thead>

                <tr>

                    <th style="width: 40px;">
                        #
                    </th>

                    <th>
                        <?= __('item') ?>
                    </th>

                    <th>
                        <?= __('sku') ?>
                    </th>

                    <th class="text-end">
                        <?= __('quantity') ?>
                    </th>

                    <th class="text-end">
                        <?= __('unit_cost') ?>
                    </th>

                    <th class="text-end">
                        <?= __('total') ?>
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php if (!empty($items)): ?>

                    <?php $n = 1; ?>

                    <?php foreach ($items as $item): ?>

                        <tr>

                            <td>
                                <?= $n++ ?>
                            </td>


                            <td>
                                <?= htmlspecialchars($item->name) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars($item->sku) ?>
                            </td>


                            <td class="text-end">

                                <?= number_format(
                                    (float)$item->quantity,
                                    2
                                ) ?>

                            </td>


                            <td class="text-end">

                                <?= number_format(
                                    (float)$item->unit_cost,
                                    2
                                ) ?>

                            </td>


                            <td class="text-end">

                                <?= number_format(
                                    (float)$item->quantity *
                                        (float)$item->unit_cost,
                                    2
                                ) ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td
                            colspan="6"
                            style="text-align:center;">

                            <?= __('no_items') ?>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>


            <tfoot>

                <tr class="total-row">

                    <th
                        colspan="5"
                        class="text-end">

                        <?= __('grand_total') ?>

                    </th>

                    <th class="text-end">

                        <?= number_format(
                            (float)$po->total_amount,
                            2
                        ) ?>

                    </th>

                </tr>

            </tfoot>

        </table>


        <!-- NOTES -->

        <?php if (!empty($po->notes)): ?>

            <div class="notes">

                <strong>
                    <?= __('notes') ?>
                </strong>

                <div style="margin-top:8px;">

                    <?= nl2br(
                        htmlspecialchars($po->notes)
                    ) ?>

                </div>

            </div>

        <?php endif; ?>


        <!-- SIGNATURES -->

        <div class="signatures">

            <div class="signature">

                <div class="signature-line">

                    <?= __('prepared_by') ?>

                </div>

            </div>


            <div class="signature">

                <div class="signature-line">

                    <?= __('approved_by') ?>

                </div>

            </div>


            <div class="signature">

                <div class="signature-line">

                    <?= __('supplier') ?>

                </div>

            </div>

        </div>

    </div>

</body>

</html>