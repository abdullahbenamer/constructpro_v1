<?php
$receiptDate = date('d M Y', strtotime($advance->advance_date));

$amount = number_format((float) $advance->amount, 2);

$receiptNumber = $receiptNumber ?? (
    'ADV-' .
    date('y', strtotime($advance->advance_date)) .
    '-' .
    str_pad((string) $advance->id, 6, '0', STR_PAD_LEFT)
);

// Convert amount to words
function amountInWords(float $amount): string
{
    $ones = [
        '', 'One', 'Two', 'Three', 'Four', 'Five',
        'Six', 'Seven', 'Eight', 'Nine', 'Ten',
        'Eleven', 'Twelve', 'Thirteen', 'Fourteen',
        'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen',
        'Nineteen'
    ];

    $tens = [
        '', '', 'Twenty', 'Thirty', 'Forty',
        'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
    ];

    $convert = function (int $number) use (&$convert, $ones, $tens): string {
        if ($number < 20) {
            return $ones[$number];
        }

        if ($number < 100) {
            return $tens[intdiv($number, 10)]
                . ($number % 10 ? ' ' . $ones[$number % 10] : '');
        }

        if ($number < 1000) {
            return $ones[intdiv($number, 100)] . ' Hundred'
                . ($number % 100 ? ' ' . $convert($number % 100) : '');
        }

        foreach ([
            1000000000 => 'Billion',
            1000000 => 'Million',
            1000 => 'Thousand'
        ] as $value => $label) {
            if ($number >= $value) {
                return $convert(intdiv($number, $value)) . ' ' . $label
                    . ($number % $value ? ' ' . $convert($number % $value) : '');
            }
        }

        return '';
    };

    $amount = round($amount, 2);
    $whole = (int) floor($amount);
    $cents = (int) round(($amount - $whole) * 100);

    $words = $whole === 0 ? 'Zero' : $convert($whole);

    if ($cents > 0) {
        $words .= ' and ' . $convert($cents) . ' Cents';
    }

    return $words . ' Only';
}

// Amount in Arabic words
function amountInWordsArabic(float $amount): string
{
    $ones = [
        0 => 'صفر',
        1 => 'واحد',
        2 => 'اثنان',
        3 => 'ثلاثة',
        4 => 'أربعة',
        5 => 'خمسة',
        6 => 'ستة',
        7 => 'سبعة',
        8 => 'ثمانية',
        9 => 'تسعة',
        10 => 'عشرة',
        11 => 'أحد عشر',
        12 => 'اثنا عشر',
        13 => 'ثلاثة عشر',
        14 => 'أربعة عشر',
        15 => 'خمسة عشر',
        16 => 'ستة عشر',
        17 => 'سبعة عشر',
        18 => 'ثمانية عشر',
        19 => 'تسعة عشر'
    ];

    $tens = [
        2 => 'عشرون',
        3 => 'ثلاثون',
        4 => 'أربعون',
        5 => 'خمسون',
        6 => 'ستون',
        7 => 'سبعون',
        8 => 'ثمانون',
        9 => 'تسعون'
    ];

    $convert = function (int $n) use (&$convert, $ones, $tens): string {
        if ($n < 20) {
            return $ones[$n];
        }

        if ($n < 100) {
            $unit = $n % 10;
            return $unit
                ? $ones[$unit] . ' و' . $tens[intdiv($n, 10)]
                : $tens[intdiv($n, 10)];
        }

        if ($n < 1000) {
            $hundreds = [
                1 => 'مائة',
                2 => 'مائتان',
                3 => 'ثلاثمائة',
                4 => 'أربعمائة',
                5 => 'خمسمائة',
                6 => 'ستمائة',
                7 => 'سبعمائة',
                8 => 'ثمانمائة',
                9 => 'تسعمائة'
            ];

            $h = intdiv($n, 100);
            $r = $n % 100;

            return $hundreds[$h]
                . ($r ? ' و' . $convert($r) : '');
        }

        foreach ([
            1000000000 => ['مليار', 'ملياران', 'مليارات'],
            1000000    => ['مليون', 'مليونان', 'ملايين'],
            1000       => ['ألف', 'ألفان', 'آلاف']
        ] as $value => $labels) {
            if ($n >= $value) {
                $q = intdiv($n, $value);
                $r = $n % $value;

                if ($q === 1) {
                    $part = $labels[0];
                } elseif ($q === 2) {
                    $part = $labels[1];
                } elseif ($q >= 3 && $q <= 10) {
                    $part = $convert($q) . ' ' . $labels[2];
                } else {
                    $part = $convert($q) . ' ' . $labels[0];
                }

                return $part . ($r ? ' و' . $convert($r) : '');
            }
        }

        return '';
    };

    $amount = round(abs($amount), 2);
    $whole = (int) floor($amount);
    $fraction = (int) round(($amount - $whole) * 100);

    $words = $convert($whole);

    if ($fraction > 0) {
        $words .= ' و' . $convert($fraction) . ' جزءًا من مائة';
    }

    return ($amount < 0 ? 'سالب ' : '') . $words . ' فقط لا غير';
}

?>

<?php
// Use the existing ConstructPro language mechanism
$language  = Language::get();
$direction = Language::direction();
$isArabic  = ($direction === 'rtl');
?>

<html lang="<?= Language::get() ?>"
      dir="<?= Language::direction() ?>">
<head>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap');
 * {
        font-family: 'Tajawal', 'Tahoma', 'Arial', sans-serif;
    }

    body {
        direction: inherit;
    }

/* Adapt to RTL and LTR automatically. */
    .text-start {
    text-align: start;
}

.text-end {
    text-align: end;
}

.content {
    margin-inline-start: 1rem;
    padding-inline-end: 1rem;
}

.receipt {
    box-sizing: border-box;
    width: 100%;
    max-width: 800px;
    padding: 18px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background: #fff;
    color: #000;
    font-size: 13px;
    line-height: 1.35;
    overflow-wrap: anywhere;
}

.receipt-heading {
    margin-bottom: 12px;
    padding-bottom: 8px;
    border-bottom: 1px solid #999;
}

.receipt-heading h4 {
    margin: 0;
    font-size: 20px;
}

.receipt-meta {
    margin-bottom: 12px;
}

.project-box {
    margin-bottom: 12px;
    padding: 10px;
    border: 1px solid #bbb;
    border-radius: 4px;
}

.project-box h5 {
    margin: 0 0 8px;
    font-size: 15px;
}

.project-code {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    padding: 7px 10px;
    border: 1px solid #bbb;
    border-radius: 4px;
    background: #f5f5f5;
}

.project-code span {
    font-size: 12px;
}

.project-code strong {
    font-size: 18px;
    overflow-wrap: anywhere;
    text-align: right;
}

.project-fields {
    row-gap: 7px;
}

.payment-details {
    margin-bottom: 12px;
}

.payment-details p {
    margin: 4px 0;
}

.amount-box {
    margin: 12px 0;
    padding: 12px;
    border: 1px solid #999;
    border-radius: 4px;
}

.amount-label {
    font-weight: bold;
}

.amount-number {
    margin: 3px 0 8px;
    font-size: 23px;
    font-weight: bold;
}

.amount-words {
    padding-top: 7px;
    border-top: 1px solid #ddd;
    line-height: 1.5;
}

.amount-words span {
    color: #b02a37;
    font-weight: bold;
}

.receipt-notes {
    margin-top: 10px;
    padding-top: 8px;
    border-top: 1px solid #ddd;
    overflow-wrap: anywhere;
}

@page {
    size: A4 portrait;
    margin: 10mm;
}

@media print {
    .no-print {
        display: none !important;
        visibility: hidden !important;
    }

    /* Hide shared layout elements */
    body > header,
    body > footer,
    header,
    footer,
    nav,
    .navbar,
    .sidebar,
    .footer,
    .main-footer,
    #footer,
    .no-print {
        display: none !important;
        visibility: hidden !important;
    }

    /* Reset the printed page */
    html,
    body {
        margin: 0 !important;
        padding: 0 !important;
        background: #fff !important;
        color: #000 !important;
        min-height: 0 !important;
        height: auto !important;
    }

    /* Hide the shared layout footer and wrappers
       when they are outside the receipt */
    body * {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .container {
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .receipt {
        display: block !important;
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;
        border-radius: 0 !important;
        font-size: 11pt;
    }

    .project-box,
    .amount-box,
    .receipt-notes {
        break-inside: avoid;
        page-break-inside: avoid;
    }
}

/* Standalone receipt layout */

.receipt {
    font-family: 'Tajawal', 'Tahoma', 'Arial', sans-serif;
    direction: inherit;
    text-align: start;
}

.receipt[dir="rtl"] {
    direction: rtl;
    text-align: right;
}

.receipt[dir="ltr"] {
    direction: ltr;
    text-align: left;
}

.company-info {
    font-family: 'Tajawal', 'Tahoma', 'Arial', sans-serif;
}


.receipt .row {
    display: flex;
    flex-wrap: wrap;
    margin-left: -6px;
    margin-right: -6px;
}

.receipt .col-6,
.receipt .col-md-6 {
    box-sizing: border-box;
    width: 50%;
    padding-left: 6px;
    padding-right: 6px;
    margin-bottom: 6px;
}

.receipt .text-center {
    text-align: center;
}

.receipt .text-end {
    text-align: right;
}

.receipt .text-muted {
    color: #666;
}

.receipt-acknowledgement {
    margin-top: 18px;
    padding-top: 10px;
    border-top: 1px solid #bbb;
    page-break-inside: avoid;
    break-inside: avoid;
}

.acknowledgement-title {
    margin: 0 0 5px;
    font-size: 13px;
    font-weight: bold;
    text-align: center;
}

.acknowledgement-text {
    margin: 0 0 12px;
    font-size: 11px;
    text-align: center;
}

.signature-grid {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 12px;
}

.signature-item {
    box-sizing: border-box;
    flex: 1;
    min-width: 0;
    text-align: center;
    font-size: 10px;
}

.signature-item strong {
    display: block;
    margin-top: 4px;
    font-size: 11px;
}

.signature-space {
    height: 35px;
    border-bottom: 1px solid #333;
}

.stamp-space {
    height: 65px;
    border: 1px dashed #888;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    color: #666;
}

@media print {
    .receipt {
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: none !important;
        font-size: 10pt;
    }

    .receipt-acknowledgement,
    .signature-grid,
    .project-box,
    .amount-box {
        page-break-inside: avoid;
        break-inside: avoid;
    }

    .no-print {
        display: none !important;
    }
}

/* =========================================
   COMPANY HEADER — RTL / LTR
========================================= */

.company-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 auto 15px;
    padding: 10px 0;
    max-width: 800px;
    border-bottom: 1px solid #ccc;
    text-align: start;
}

.company-header[dir="rtl"] {
    flex-direction: row;
    text-align: right;
}

.company-header[dir="ltr"] {
    flex-direction: row;
    text-align: left;
}

.company-logo {
    width: auto;
    height: auto;
    max-width: 110px;
    max-height: 75px;
    object-fit: contain;
    flex-shrink: 0;
}

.company-info {
    min-width: 0;
    flex: 1;
    font-family: 'Tajawal', Arial, sans-serif;
    overflow-wrap: anywhere;
}

.company-name {
    display: block;
    margin-bottom: 5px;
    font-size: 20px;
}

.company-contact {
    margin-top: 3px;
    font-size: 12px;
    overflow-wrap: anywhere;
}

.company-contact i {
    margin-inline-end: 4px;
}

/* =========================================
   RECEIPT — RTL / LTR
========================================= */

.receipt[dir="rtl"] {
    direction: rtl;
    text-align: right;
}

.receipt[dir="ltr"] {
    direction: ltr;
    text-align: left;
}

.receipt .receipt-heading {
    text-align: center;
}

.receipt[dir="rtl"] .text-end {
    text-align: left !important;
}

.receipt[dir="ltr"] .text-end {
    text-align: right !important;
}

.receipt[dir="rtl"] .project-code {
    direction: rtl;
}

.receipt[dir="ltr"] .project-code {
    direction: ltr;
}

.receipt[dir="rtl"] .project-code strong {
    text-align: left;
}

.receipt[dir="ltr"] .project-code strong {
    text-align: right;
}

/* Keep codes, references, dates and numbers readable */
.receipt .project-code strong,
.receipt .amount-number,
.receipt-meta,
.receipt .payment-details {
    unicode-bidi: plaintext;
}

/* Amount number: preserve digit order, adapt alignment */
.receipt .amount-number {
    direction: ltr;
    unicode-bidi: isolate;
    text-align: left;
}

.receipt[dir="rtl"] .amount-number {
    text-align: right;
}

.receipt[dir="ltr"] .amount-number {
    text-align: left;
}

.receipt .amount-words {
    overflow-wrap: anywhere;
}

.receipt .amount-words span {
    unicode-bidi: plaintext;
}

/* Signatures and stamp */
.receipt[dir="rtl"] .signature-grid {
    direction: rtl;
}

.receipt[dir="ltr"] .signature-grid {
    direction: ltr;
}

.signature-item {
    overflow-wrap: anywhere;
}

/* =========================================
   PRINT
========================================= */

@media print {
    .company-header {
        max-width: none;
        margin-top: 0 !important;
        margin-bottom: 10px;
        break-inside: avoid;
        page-break-inside: avoid;
    }

    .company-logo {
        max-height: 65px;
    }

    .receipt {
        box-sizing: border-box;
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
    }

    .company-header,
    .receipt {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}
</style>
</head>
<body>
<div class="container my-3">

    <!-- SCREEN-ONLY ACTIONS -->
<div class="no-print" style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 20px;">

    <a
        href="<?= URLROOT ?>/projectadvance/list/<?= (int) $project->id ?>"
        style="display:inline-block; padding:10px 20px; background:#5c636a; color:#fff; border:1px solid #565e64; border-radius:6px; font-weight:bold; text-decoration:none;">
        <?= __('back') ?>
    </a>

    <button
        type="button"
        onclick="window.print()"
        style="padding:10px 20px; background:#0d6efd; color:#fff; border:1px solid #0d6efd; border-radius:6px; font-weight:bold; cursor:pointer;">
        <?= __('print_receipt') ?>
    </button>

</div>
    <!-- ===================== COMPANY HEADER ================== -->
<div
    class="company-header"
    dir="<?= $direction ?>"
    lang="<?= $isArabic ? 'ar' : 'en' ?>">
    <?php if (!empty($settings->logo)): ?>
        <img width="70"
            src="<?= URLROOT ?>/<?= htmlspecialchars($settings->logo, ENT_QUOTES, 'UTF-8') ?>"
            class="company-logo"
            alt="<?= htmlspecialchars($settings->company_name ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>
    <div class="company-info">
        <strong class="company-name">
            <?= htmlspecialchars($settings->company_name ?? '', ENT_QUOTES, 'UTF-8') ?>
        </strong>
        <?php if (!empty($settings->address)): ?>
            <div class="company-contact">
                <i class="fas fa-location-dot"></i>
                <?= htmlspecialchars($settings->address, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings->contacts)): ?>
            <div class="company-contact" dir="auto">
                <i class="fas fa-mobile"></i>
                <span><?= htmlspecialchars($settings->contacts, ENT_QUOTES, 'UTF-8') ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>
    <!-- RECEIPT -->
  <div
    class="receipt mx-auto"
    dir="<?= $direction ?>"
    lang="<?= $isArabic ? 'ar' : 'en' ?>">

        <div class="text-center receipt-heading">
            <h4><?= __('customer_advance_receipt') ?></h4>
        </div>

        <!-- RECEIPT NUMBER AND DATE -->
        <div class="row receipt-meta">
            <div class="col-6">
                <strong><?= __('receipt_number') ?>:</strong>
                <?= htmlspecialchars($receiptNumber, ENT_QUOTES, 'UTF-8') ?>
            </div>

          <div class="col-6 text-end">
    <strong><?= __('date') ?>:</strong>
    <span dir="ltr" style="display: inline-block; unicode-bidi: isolate;">
        <?= htmlspecialchars($receiptDate, ENT_QUOTES, 'UTF-8') ?>
    </span>
</div>
        </div>

        <!-- PROJECT INFORMATION -->
        <div class="project-box">
            <h5><?= __('project_details') ?></h5>

            <div class="project-code">
                <span><?= __('project_code') ?></span>
                <strong>
                    <?= htmlspecialchars(
                        $project->project_code ?? '-',
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </strong>
            </div>

            <div class="row project-fields">
                <div class="col-6">
                    <strong><?= __('project') ?>:</strong>
                    <?= htmlspecialchars(
                        $project->title ?? '-',
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>

                <div class="col-6">
                    <strong><?= __('customer') ?>:</strong>
                    <?= htmlspecialchars(
                        $project->customer_name ?? '-',
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>

                <div class="col-6">
                    <strong><?= __('contract_number') ?>:</strong>
                    <?= htmlspecialchars(
                        $project->contract_number ?? '-',
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>

                <div class="col-6">
                    <strong><?= __('site_location') ?>:</strong>
                    <?= htmlspecialchars(
                        $project->site_location ?? '-',
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>
            </div>
        </div>

        <!-- PAYMENT INFORMATION -->
        <div class="payment-details">
            <p>
                <strong><?= __('payment_method') ?>:</strong>
                <?= htmlspecialchars(
                    __($advance->payment_method ?? '-'),
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </p>

            <p>
                <strong><?= __('reference') ?>:</strong>
                <?= htmlspecialchars(
                    $advance->reference ?? '-',
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </p>
        </div>

        <!-- AMOUNT -->
        <div class="amount-box">
            <div class="amount-label">
                <?= __('amount_received') ?>
            </div>

            <div class="amount-number">
                <?= $amount ?>
            </div>

            <div class="amount-words">
                <strong><?= __('amount_in_words') ?>:</strong>
        
<span dir="auto" class="amount-words-value">
    <?= htmlspecialchars(
        $isArabic
            ? amountInWordsArabic((float) $advance->amount)
            : amountInWords((float) $advance->amount),
        ENT_QUOTES,
        'UTF-8'
    ) ?>
</span>

            </div>
        </div>

        <!-- OPTIONAL NOTES -->
        <?php if (!empty($advance->notes)): ?>
            <div class="receipt-notes">
                <strong><?= __('notes') ?>:</strong>
                <?= nl2br(htmlspecialchars(
                    $advance->notes,
                    ENT_QUOTES,
                    'UTF-8'
                )) ?>
            </div>
        <?php endif; ?>


<!-- RECEIPT ACKNOWLEDGEMENT -->
<div class="receipt-acknowledgement">

    <p class="acknowledgement-title">
        <?= __('receipt_acknowledgement') ?>
    </p>

    <p class="acknowledgement-text">
        <?= __('advance_received_confirmation') ?>
    </p>

    <div class="signature-grid">

        <div class="signature-item">
            <div class="signature-space"></div>
            <strong><?= __('received_by') ?></strong>
            <div><?= __('name_and_signature') ?></div>
        </div>

        <div class="signature-item">
            <div class="signature-space"></div>
            <strong><?= __('authorized_signature') ?></strong>
            <div><?= __('company_representative') ?></div>
        </div>

        <div class="signature-item stamp-item">
            <div class="stamp-space">
                <?= __('company_stamp') ?>
            </div>
        </div>

    </div>

</div>


    </div>
</div>

        </body>
</html>