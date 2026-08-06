<!DOCTYPE html>
<html>
<head>
    <title>Receipt #<?= $sale->id ?></title>

    <script>
        window.onload = function () {

            window.print();

            window.onafterprint = function () {
                window.close();
            };

        };
    </script>
</head>
<body>

<h3>Receipt #<?= $sale->id ?></h3>

<p>Cashier: <?= htmlspecialchars($sale->user_name) ?></p>

<hr>

<?php foreach ($items as $item): ?>
    <div>
        <?= htmlspecialchars($item->name) ?> -
        <?= $item->quantity ?> × <?= $item->unit_price ?>
        = <?= $item->total ?>
    </div>
<?php endforeach; ?>

<hr>

<strong>Total: <?= $sale->total ?></strong>

</body>
</html>