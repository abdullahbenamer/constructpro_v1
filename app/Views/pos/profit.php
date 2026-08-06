<h2>Profit Report</h2>

<form method="GET" class="mb-3">
    From: <input type="date" name="from" value="<?= $from ?>">
    To: <input type="date" name="to" value="<?= $to ?>">
    <button type="submit">Filter</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Revenue</th>
            <th>Cost</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>

    <?php 
    $totalRevenue = 0;
    $totalCost = 0;
    $totalProfit = 0;
    ?>

    <?php foreach ($report as $row): ?>

        <?php
        $totalRevenue += $row->revenue;
        $totalCost    += $row->cost;
        $totalProfit  += $row->profit;
        ?>

        <tr>
            <td><?= $row->sale_date ?></td>
            <td><?= number_format($row->revenue, 2) ?></td>
            <td><?= number_format($row->cost, 2) ?></td>
            <td>
                <strong><?= number_format($row->profit, 2) ?></strong>
            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>

    <tfoot>
        <tr>
            <th>Total</th>
            <th><?= number_format($totalRevenue, 2) ?></th>
            <th><?= number_format($totalCost, 2) ?></th>
            <th><?= number_format($totalProfit, 2) ?></th>
        </tr>
    </tfoot>
</table>