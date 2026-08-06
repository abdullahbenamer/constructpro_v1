<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Receipt #<?= $sale->id ?></title>

    <style>
        body {
            font-family: monospace;
            width: 80mm;
            margin: 0 auto;
            padding: 5px;
            font-size: 13px;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        .item {
            margin-bottom: 6px;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }

        @media print {
            button {
                display: none;
            }

            body {
                width: 80mm;
            }
        }
    </style>
</head>

<body>

    <div class="center bold">
        <img src="<?= URLROOT ?>/images/logo.png" style="width:60px;">
    </div>

    <div class="center">
        POS Receipt
    </div>

    <div class="line"></div>

    <div>
        Receipt #: <?= $sale->id ?><br>
        Date: <?= date('Y-m-d H:i', strtotime($sale->created_at)) ?>
    </div>

    <div class="line"></div>

    <!-- ITEMS -->
    <?php foreach ($items as $item) : ?>

        <?php
        $qty       = (int)$item->quantity;
        $price     = (float)$item->unit_price;
        $total     = (float)$item->total;
        $unitLabel = $item->unit_label;
        $pack      = (int)($item->units_per_stock ?: 1);

        // Breakdown (only for display)
        if ($pack > 1 && $unitLabel !== $item->sale_unit) {
            $full = intdiv($qty, $pack);
            $rem  = $qty % $pack;
        } else {
            $full = $qty;
            $rem  = 0;
        }
        ?>

        <div class="item">

            <!-- Product name -->
            <div class="bold"><?= strtoupper($item->name) ?></div>

            <!-- Quantity line -->
            <div class="flex">
                <div>
                    <?php if ($unitLabel === $item->sale_unit) : ?>
                        <?= $qty ?> <?= $unitLabel ?> × <?= number_format($price, 2) ?>

                    <?php elseif ($pack > 1) : ?>
                        <?php if ($full > 0) : ?>
                            <?= $full ?> <?= $item->sale_unit ?>
                        <?php endif; ?>

                        <?php if ($rem > 0) : ?>
                            <?php if ($full > 0) echo " + "; ?>
                            <?= $rem ?> <?= $item->base_unit ?>
                        <?php endif; ?>

                    <?php else : ?>
                        <?= $qty ?> <?= $unitLabel ?> × <?= number_format($price, 2) ?>
                    <?php endif; ?>
                </div>

                <div class="right">
                    <?= number_format($total, 2) ?>
                </div>
            </div>

        </div>

    <?php endforeach; ?>

    <div class="line"></div>

    <!-- TOTALS -->
    <div class="flex bold">
        <div>TOTAL</div>
        <div><?= number_format($sale->total, 2) ?></div>
    </div>

    <div class="flex">
        <div>Paid</div>
        <div><?= number_format($sale->paid, 2) ?></div>
    </div>

    <div class="flex">
        <div>Change</div>
        <div><?= number_format($sale->change_amount, 2) ?></div>
    </div>

    <div class="line"></div>
    <hr>
    <div><?php if (isset($_SESSION['user_name'])) : ?>
    <span>
       Cashier: <?= $_SESSION['user_name'] ?>
    </span>
<?php endif; ?></div>
<br>
    <div class="center">
        Thank you!
    </div>

    <br>

    <div class="center">
        <button onclick="window.print()">Print</button>
    </div>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
    <script>
        // FORCE RESET AFTER RECEIPT CLOSE
window.onunload = function () {
    window.opener?.location.reload();
};
</script>
</body>

</html>