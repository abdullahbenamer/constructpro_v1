<?php

$language  = $_SESSION['language'] ?? 'en';
$direction = ($language === 'ar') ? 'rtl' : 'ltr';

$grnNumber  = $grn->grn_number ?? '-';
$receiptDate = $grn->receipt_date ?? '-';
$poNumber   = $grn->po_number ?? '-';
$totalAmount = (float)($grn->total_amount ?? 0);
$remarks     = trim((string)($grn->remarks ?? ''));

$warehouse = '-';

if (!empty($items)) {
    $warehouse =
        $items[0]->location_name
        ?? $items[0]->location_code
        ?? '-';
}

$companyName     = $settings->company_name ?? 'Company Name';
$companyLogo     = $settings->logo ?? '';
$companyAddress  = $settings->address ?? '';
$companyContacts = $settings->contacts ?? '';

/*
 * Supplier information.
 * These fields are supplied by GoodsReceiptModel::getById().
 */
$supplierName = $grn->company_name ?? '-';
$supplierContactPerson = $grn->contact_person ?? '';
$supplierPhone = $grn->phone ?? '';
$supplierEmail = $grn->email ?? '';
$supplierAddress = $grn->address ?? '';
$supplierNotes = trim((string)($grn->supplier_notes ?? ''));

?>
<!DOCTYPE html>
<html
    lang="<?= htmlspecialchars($language) ?>"
    dir="<?= htmlspecialchars($direction) ?>"
>
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        <?= __('goods_receipt_note') ?>
        -
        <?= htmlspecialchars($grnNumber) ?>
    </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Tajawal:wght@400;500;700&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            background: #fff;
            color: #000;
            font-family: 'Tajawal', 'Cairo', Arial, sans-serif;
            font-size: 13px;
        }

        .document {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        /* ACTION BUTTONS */
        .actions {
            margin-bottom: 20px;
            text-align: center;
        }

        .actions button {
            border: none;
            padding: 8px 18px;
            margin: 0 4px;
            cursor: pointer;
            border-radius: 4px;
            font-family: inherit;
            font-size: 13px;
        }

        .btn-print {
            background: #212529;
            color: #fff;
        }

        .btn-close {
            background: #6c757d;
            color: #fff;
        }

        /* COMPANY / GRN HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 14px;
            margin-bottom: 22px;
        }

        .company-block {
            flex: 1;
        }

        .company-logo {
            margin-bottom: 8px;
        }

        .company-logo img {
            max-width: 180px;
            max-height: 70px;
            object-fit: contain;
        }

        .company-name {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .company-detail {
            font-size: 11px;
            line-height: 1.6;
        }

        .grn-block {
            min-width: 280px;
            text-align: right;
        }

        html[dir="rtl"] .grn-block {
            text-align: left;
        }

        .document-title {
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .meta {
            font-size: 12px;
            line-height: 1.8;
        }

        .meta strong {
            display: inline-block;
            min-width: 125px;
        }

        /* INFORMATION BOXES */
        .info-box {
            border: 1px solid #aaa;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: 700;
            font-size: 14px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 6px;
            margin-bottom: 10px;
        }

        /* SUPPLIER INFORMATION */
        .supplier-name {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .supplier-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px 30px;
        }

        .supplier-field {
            font-size: 12px;
            line-height: 1.6;
        }

        .supplier-field strong {
            display: inline-block;
            min-width: 105px;
        }

        .supplier-address {
            margin-top: 8px;
            font-size: 12px;
            line-height: 1.6;
        }

        .supplier-notes {
            margin-top: 8px;
            padding-top: 8px;
            border-top: 1px solid #ddd;
            font-size: 11px;
            color: #444;
        }

        /* WAREHOUSE INFORMATION */
        .warehouse-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .warehouse-label {
            font-weight: 700;
        }

        /* ITEMS TABLE */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #999;
            padding: 8px 7px;
            vertical-align: middle;
        }

        .items-table th {
            background: #f2f2f2;
            font-weight: 700;
            text-align: center;
        }

        .items-table td {
            font-size: 12px;
        }

        .number {
            text-align: center;
        }

        .amount {
            text-align: right;
            white-space: nowrap;
        }

        html[dir="rtl"] .amount {
            text-align: left;
        }

        .total-row td {
            font-weight: 700;
            background: #f7f7f7;
        }

        /* REMARKS */
        .remarks {
            margin-top: 22px;
        }

        .remarks-title {
            font-weight: 700;
            margin-bottom: 7px;
        }

        .remarks-box {
            border: 1px solid #aaa;
            min-height: 55px;
            padding: 10px;
            white-space: pre-wrap;
        }

        /* DELIVERY ACKNOWLEDGEMENT */
        .acknowledgement {
            margin-top: 28px;
            border: 1px solid #aaa;
            padding: 14px;
        }

        .ack-title {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .ack-text {
            font-size: 12px;
            line-height: 1.7;
        }

        .ack-fields {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 30px;
            margin-top: 18px;
        }

        .ack-field {
            font-size: 12px;
            min-height: 28px;
        }

        .line {
            display: inline-block;
            min-width: 170px;
            border-bottom: 1px solid #000;
            margin-left: 6px;
        }

        html[dir="rtl"] .line {
            margin-left: 0;
            margin-right: 6px;
        }

        .stamp-box {
            height: 65px;
            border: 1px dashed #999;
            margin-top: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 11px;
        }

        /* SIGNATURES */
        .signatures {
            margin-top: 45px;
            display: flex;
            justify-content: space-between;
            gap: 40px;
        }

        .signature {
            width: 30%;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin-top: 45px;
            padding-top: 6px;
            font-size: 12px;
        }

        /* FOOTER */
        .footer {
            margin-top: 30px;
            padding-top: 8px;
            border-top: 1px solid #999;
            text-align: center;
            font-size: 10px;
            color: #666;
        }

        /* PRINT */
        @media print {
            @page {
                size: A4 portrait;
                margin: 12mm;
            }

            body {
                padding: 0;
            }

            .actions {
                display: none !important;
            }

            .document {
                max-width: none;
            }

            .items-table thead {
                display: table-header-group;
            }

            .items-table tr {
                page-break-inside: avoid;
            }

            .info-box,
            .acknowledgement,
            .signatures {
                break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <div class="actions">

        <button
            type="button"
            class="btn-print"
            onclick="window.print()"
        >
            <?= __('print') ?>
        </button>

        <button
            type="button"
            class="btn-close"
            onclick="closePrintView()"
        >
            <?= __('close') ?>
        </button>

    </div>


    <div class="document">

        <!-- ==========================================================
             COMPANY / GRN HEADER
        =========================================================== -->

        <div class="header">

            <div class="company-block">

                <?php if (!empty($companyLogo)): ?>

                    <div class="company-logo">

                        <img
                            src="<?= URLROOT ?>/<?= htmlspecialchars(ltrim($companyLogo, '/')) ?>"
                            alt="<?= htmlspecialchars($companyName) ?>"
                        >

                    </div>

                <?php endif; ?>

                <div class="company-name">
                    <?= htmlspecialchars($companyName) ?>
                </div>

                <?php if (!empty($companyAddress)): ?>

                    <div class="company-detail">
                        <?= nl2br(htmlspecialchars($companyAddress)) ?>
                    </div>

                <?php endif; ?>

                <?php if (!empty($companyContacts)): ?>

                    <div class="company-detail">
                        <?= nl2br(htmlspecialchars($companyContacts)) ?>
                    </div>

                <?php endif; ?>

            </div>


            <div class="grn-block">

                <div class="document-title">
                    <?= __('goods_receipt_note') ?>
                </div>

                <div class="meta">
                    <strong><?= __('grn_number') ?>:</strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($grnNumber) ?>
                    </span>
                </div>

                <div class="meta">
                    <strong><?= __('receipt_date') ?>:</strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($receiptDate) ?>
                    </span>
                </div>

                <div class="meta">
                    <strong><?= __('po_number') ?>:</strong>

                    <span dir="ltr">
                        <?= htmlspecialchars($poNumber) ?>
                    </span>
                </div>

            </div>

        </div>


        <!-- ==========================================================
             SUPPLIER INFORMATION
        =========================================================== -->

        <div class="info-box">

            <div class="section-title">
                <?= __('supplier') ?>
            </div>

            <div class="supplier-name">
                <?= htmlspecialchars($supplierName) ?>
            </div>

            <div class="supplier-grid">

                <?php if ($supplierContactPerson !== ''): ?>

                    <div class="supplier-field">

                        <strong><?= __('contact_person') ?>:</strong>

                        <?= htmlspecialchars($supplierContactPerson) ?>

                    </div>

                <?php endif; ?>


                <?php if ($supplierPhone !== ''): ?>

                    <div class="supplier-field">

                        <strong><?= __('phone') ?>:</strong>

                        <span dir="ltr">
                            <?= htmlspecialchars($supplierPhone) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <?php if ($supplierEmail !== ''): ?>

                    <div class="supplier-field">

                        <strong><?= __('email') ?>:</strong>

                        <span dir="ltr">
                            <?= htmlspecialchars($supplierEmail) ?>
                        </span>

                    </div>

                <?php endif; ?>

            </div>


            <?php if ($supplierAddress !== ''): ?>

                <div class="supplier-address">

                    <strong><?= __('address') ?>:</strong>

                    <?= nl2br(htmlspecialchars($supplierAddress)) ?>

                </div>

            <?php endif; ?>


            <?php if ($supplierNotes !== ''): ?>

                <div class="supplier-notes">

                    <strong><?= __('notes') ?>:</strong>

                    <?= nl2br(htmlspecialchars($supplierNotes)) ?>

                </div>

            <?php endif; ?>

        </div>


        <!-- ==========================================================
             RECEIVING LOCATION
        =========================================================== -->

        <div class="info-box">

            <div class="warehouse-row">

                <div>

                    <span class="warehouse-label">
                        <?= __('receive_to_location') ?>:
                    </span>

                    <?= htmlspecialchars($warehouse) ?>

                </div>

                <div>

                    <span class="warehouse-label">
                        <?= __('purchase_order') ?>:
                    </span>

                    <span dir="ltr">
                        <?= htmlspecialchars($poNumber) ?>
                    </span>

                </div>

            </div>

        </div>


        <!-- ==========================================================
             ITEMS ACTUALLY RECEIVED IN THIS GRN
        =========================================================== -->

        <table class="items-table">

            <thead>

                <tr>

                    <th style="width: 7%;">
                        #
                    </th>

                    <th>
                        <?= __('item') ?>
                    </th>

                    <th style="width: 14%;">
                        <?= __('sku') ?>
                    </th>

                    <th style="width: 13%;">
                        <?= __('unit_of_measure') ?>
                    </th>

                    <th style="width: 13%;">
                        <?= __('received_quantity') ?>
                    </th>

                    <th style="width: 15%;">
                        <?= __('unit_cost') ?>
                    </th>

                    <th style="width: 17%;">
                        <?= __('total_amount') ?>
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php if (!empty($items)): ?>

                    <?php foreach ($items as $index => $item): ?>

                        <tr>

                            <td class="number">
                                <?= $index + 1 ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($item->name ?? '-') ?>
                            </td>

                            <td
                                class="number"
                                dir="ltr"
                            >
                                <?= htmlspecialchars($item->sku ?? '-') ?>
                            </td>

                            <td class="number">
                                <?= htmlspecialchars($item->base_unit ?? '-') ?>
                            </td>

                            <td class="number">
                                <?= number_format(
                                    (float)$item->quantity,
                                    2
                                ) ?>
                            </td>

                            <td
                                class="amount"
                                dir="ltr"
                            >
                                <?= number_format(
                                    (float)$item->unit_cost,
                                    2
                                ) ?>
                            </td>

                            <td
                                class="amount"
                                dir="ltr"
                            >
                                <?= number_format(
                                    (float)$item->total_cost,
                                    2
                                ) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td
                            colspan="7"
                            class="number"
                        >
                            -
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>


            <tfoot>

                <tr class="total-row">

                    <td
                        colspan="6"
                        class="amount"
                    >
                        <?= __('total_amount') ?>
                    </td>

                    <td
                        class="amount"
                        dir="ltr"
                    >
                        <?= number_format($totalAmount, 2) ?>
                    </td>

                </tr>

            </tfoot>

        </table>


        <!-- ==========================================================
             REMARKS
        =========================================================== -->

        <?php if ($remarks !== ''): ?>

            <div class="remarks">

                <div class="remarks-title">
                    <?= __('notes') ?>
                </div>

                <div class="remarks-box">
                    <?= htmlspecialchars($remarks) ?>
                </div>

            </div>

        <?php endif; ?>


        <!-- ==========================================================
             DELIVERY ACKNOWLEDGEMENT
        =========================================================== -->

        <div class="acknowledgement">

            <div class="ack-title">
                <?= __('receiving_acknowledgement') ?>
            </div>

            <div class="ack-text">
                <?= __('goods_receipt_acknowledgement_text') ?>
            </div>

            <div class="ack-fields">

                <div class="ack-field">
                    <?= __('received_by') ?>:
                    <span class="line"></span>
                </div>

                <div class="ack-field">
                    <?= __('position') ?>:
                    <span class="line"></span>
                </div>

                <div class="ack-field">
                    <?= __('signature') ?>:
                    <span class="line"></span>
                </div>

                <div class="ack-field">

                    <?= __('stamp') ?>:

                    <div class="stamp-box">
                        <?= __('stamp') ?>
                    </div>

                </div>

            </div>

        </div>


        <!-- ==========================================================
             INTERNAL SIGNATURES
        =========================================================== -->

        <div class="signatures">

            <div class="signature">
                <div class="signature-line">
                    <?= __('delivered_by') ?>
                </div>
            </div>

            <div class="signature">
                <div class="signature-line">
                    <?= __('received_by') ?>
                </div>
            </div>

            <div class="signature">
                <div class="signature-line">
                    <?= __('approved_by') ?>
                </div>
            </div>

        </div>


        <!-- ==========================================================
             FOOTER
        =========================================================== -->

        <div class="footer">
            <?= htmlspecialchars($companyName) ?>
            &nbsp; | &nbsp;
            <?= htmlspecialchars($grnNumber) ?>
        </div>

    </div>


    <script>
        function closePrintView()
        {
            if (
                window.opener &&
                !window.opener.closed
            ) {
                window.close();
                return;
            }

            if (window.history.length > 1) {
                window.history.back();
                return;
            }

            window.location.href =
                <?= json_encode(
                    URLROOT . '/inventory/receive/'
                ) ?>;
        }
    </script>

</body>
</html>
