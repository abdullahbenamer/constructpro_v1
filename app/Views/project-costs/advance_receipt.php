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
?>

<div class="container my-3">

    <!-- SCREEN-ONLY ACTIONS -->
    <div class="d-flex justify-content-between mb-3 no-print">
        <a
            href="<?= URLROOT ?>/projectadvance/list/<?= (int) $project->id ?>"
            class="btn btn-secondary">
            <?= __('back') ?>
        </a>

        <button
            type="button"
            class="btn btn-primary"
            onclick="window.print()">
            <i class="fas fa-print"></i>
            <?= __('print_receipt') ?>
        </button>
    </div>

    <!-- RECEIPT -->
    <div class="receipt mx-auto">

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
                <?= htmlspecialchars($receiptDate, ENT_QUOTES, 'UTF-8') ?>
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
                <span>
                    <?= htmlspecialchars(
                        amountInWords((float) $advance->amount),
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

    </div>
</div>

<style>
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
    html,
    body {
        margin: 0 !important;
        padding: 0 !important;
        background: #fff !important;
        color: #000 !important;
    }  

    body {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .no-print,
    header,
    footer,
    nav,
    .sidebar {
        display: none !important;
    }

    .container,
    .receipt {
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .receipt {
        border: none !important;
        border-radius: 0 !important;
        font-size: 11pt;
    }

    .project-box {
        break-inside: avoid;
    }

    .amount-box {
        break-inside: avoid;
    }

    .receipt-notes {
        break-inside: avoid;
    }

    footer,
    .footer,
    .main-footer,
    #footer {
        display: none !important;
    }

}
</style>