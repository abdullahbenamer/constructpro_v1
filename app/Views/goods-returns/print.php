<!DOCTYPE html>

<html
    lang="<?= htmlspecialchars(Language::get()) ?>"
    dir="<?= htmlspecialchars(Language::direction()) ?>">

<head>

    <meta charset="UTF-8">

    <title>
        <?= __('goods_return_note') ?> -
        <?= htmlspecialchars($return->return_number) ?>
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

        /* RETURN INFORMATION */

        .return-block {
            width: 270px;
            text-align: left;
        }

        html[dir="rtl"] .return-block {
            text-align: right;
        }

        .document-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .return-block .meta {
            font-size: 12px;
            margin-bottom: 5px;
        }

        /* INFO BOXES */

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

        /* TABLE */

        table {
            width: 100%;
            border-collapse: collapse;
        }

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

        /* NOTES */

        .notes {
            margin-top: 25px;
            border: 1px solid #ccc;
            padding: 12px;
        }

        /* ACKNOWLEDGEMENT */

        .acknowledgement {
            margin-top: 25px;
            border: 1px solid #ccc;
            padding: 14px 16px;
        }

        .acknowledgement-text {
            margin-top: 8px;
            margin-bottom: 25px;
        }

        .ack-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 35px;
            row-gap: 14px;
        }

        .ack-field {
            font-size: 12.5px;
            min-height: 24px;
        }

        .ack-line {
            display: inline-block;
            min-width: 180px;
            border-bottom: 1px solid #000;
            margin-left: 6px;
        }

        html[dir="rtl"] .ack-line {
            margin-left: 0;
            margin-right: 6px;
        }

        .stamp-box {
            height: 70px;
            border: 1px dashed #999;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 12px;
        }

        /* SIGNATURES */

        .signatures {
            margin-top: 55px;
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

        /* PRINT */

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

<script>
function closePrintWindow()
{
    /*
     * If this print page was opened by JavaScript
     * in a separate window/tab, close it.
     */
    if (
        window.opener &&
        !window.opener.closed
    ) {
        window.close();
        return;
    }

    /*
     * If the user opened the print page directly,
     * the browser normally does not allow JavaScript
     * to close the tab.
     *
     * In that case, go back to the previous page.
     */
    if (window.history.length > 1) {
        window.history.back();
        return;
    }

    /*
     * Final fallback.
     */
    window.location.href =
        '<?= URLROOT ?>/goodsreturns';
}
</script>

</head>

<body>

    <div class="actions">

        <button onclick="window.print()">
            <?= __('print_goods_return') ?>
        </button>

     <button
    type="button"
    onclick="closePrintWindow()"
>
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


            <!-- GOODS RETURN INFORMATION -->

            <div class="return-block">

                <div class="document-title">

                    <?= __('goods_return_note') ?>

                </div>


                <div class="meta">

                    <strong>
                        <?= __('return_number') ?>:
                    </strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($return->return_number) ?>
                    </span>

                </div>


                <div class="meta">

                    <strong>
                        <?= __('return_date') ?>:
                    </strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($return->return_date) ?>
                    </span>

                </div>


                <div class="meta">

                    <strong>
                        <?= __('grn_number') ?>:
                    </strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($return->grn_number ?? '-') ?>
                    </span>

                </div>


                <div class="meta">

                    <strong>
                        <?= __('po_number') ?>:
                    </strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($return->po_number ?? '-') ?>
                    </span>

                </div>

            </div>

        </div>


        <!-- SUPPLIER -->

        <div class="info-box supplier-box">

            <div class="section-title">
                <?= __('supplier') ?>
            </div>

            <div class="supplier-grid">

                <div class="supplier-main">

                    <div class="supplier-company">

                        <?= htmlspecialchars(
                            $return->supplier_name ?? '-'
                        ) ?>

                    </div>

                </div>

            </div>

        </div>


        <!-- RETURN FROM WAREHOUSE -->

        <?php
        $returnWarehouse = null;

        if (!empty($items)) {
            $returnWarehouse = $items[0];
        }
        ?>

        <div
            class="supplier-box"
            style="margin-bottom: 25px;">

            <strong>
                <?= __('return_from_warehouse') ?>
            </strong>

            <div style="margin-top: 10px;">

                <?php if ($returnWarehouse): ?>

                    <?= htmlspecialchars(
                        $returnWarehouse->original_location_code ?? ''
                    ) ?>

                    <?php if (
                        !empty($returnWarehouse->original_location_name)
                    ): ?>

                        -
                        <?= htmlspecialchars(
                            $returnWarehouse->original_location_name
                        ) ?>

                    <?php endif; ?>

                <?php else: ?>

                    <?= __('not_recorded') ?>

                <?php endif; ?>

            </div>

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

                    <th>
                        <?= __('unit_of_measure') ?>
                    </th>

                    <th class="text-end">
                        <?= __('quantity_returned') ?>
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
                                <?= htmlspecialchars(
                                    $item->name ?? '-'
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $item->sku ?? '-'
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $item->unit_name ?? '-'
                                ) ?>
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
                            colspan="7"
                            style="text-align:center;">

                            <?= __('no_items') ?>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>


            <tfoot>

                <tr class="total-row">

                    <th
                        colspan="4"
                        class="text-end">

                        <?= __('grand_total') ?>

                    </th>

                    <th class="text-end">

                        <?php
                        $totalQuantity = 0;

                        foreach ($items ?? [] as $item) {
                            $totalQuantity += (float)$item->quantity;
                        }

                        echo number_format($totalQuantity, 2);
                        ?>

                    </th>

                    <th></th>

                    <th class="text-end">

                        <?= number_format(
                            (float)($return->total_amount ?? 0),
                            2
                        ) ?>

                    </th>

                </tr>

            </tfoot>

        </table>


        <!-- RETURN REASON -->

        <?php if (!empty($return->reason)): ?>

            <div class="notes">

                <strong>
                    <?= __('return_reason') ?>
                </strong>

                <div style="margin-top:8px;">

                    <?= nl2br(
                        htmlspecialchars($return->reason)
                    ) ?>

                </div>

            </div>

        <?php endif; ?>


        <!-- NOTES -->

        <?php if (!empty($return->notes)): ?>

            <div class="notes">

                <strong>
                    <?= __('notes') ?>
                </strong>

                <div style="margin-top:8px;">

                    <?= nl2br(
                        htmlspecialchars($return->notes)
                    ) ?>

                </div>

            </div>

        <?php endif; ?>


        <!-- SUPPLIER ACKNOWLEDGEMENT -->

        <div class="acknowledgement">

            <div class="section-title">

                <?= __('supplier_acknowledgement') ?>

            </div>

            <div class="acknowledgement-text">

                <?= __('supplier_receipt_acknowledgement_text') ?>

            </div>


            <div class="ack-grid">

                <div class="ack-field">

                    <strong>
                        <?= __('received_by') ?>:
                    </strong>

                    <span class="ack-line"></span>

                </div>


                <div class="ack-field">

                    <strong>
                        <?= __('position') ?>:
                    </strong>

                    <span class="ack-line"></span>

                </div>


                <div class="ack-field">

                    <strong>
                        <?= __('signature') ?>:
                    </strong>

                    <span class="ack-line"></span>

                </div>


                <div class="ack-field">

                    <strong>
                        <?= __('date') ?>:
                    </strong>

                    <span class="ack-line"></span>

                </div>

            </div>


            <div style="margin-top: 18px;">

                <strong>
                    <?= __('supplier_stamp') ?>
                </strong>

                <div class="stamp-box">
                    <?= __('supplier_stamp') ?>
                </div>

            </div>

        </div>


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

                    <?= __('supplier_received_by') ?>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
