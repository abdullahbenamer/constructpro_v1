<?php
$allowed = $_SESSION['allowed_locations'] ?? [];
$location_id = $_SESSION['active_location_id'] ?? ($allowed[0] ?? null);

if (!$location_id) {
    $_SESSION['error'] = "No warehouse assigned to this user";
    $location_id = null;
}
?>
<h2 class="mb-3">
    <i class="fas fa-cash-register"></i>
    POS System
</h2>
<?php if (AuthHelper::canView('pos.change_location')): ?>
    <form method="POST"
        action="<?= URLROOT ?>/pos/setLocation">
        <select name="location_id"
            onchange="this.form.submit()"
            class="form-select">
            <?php foreach (($locations ?? []) as $loc): ?>
                <option value="<?= $loc->id ?>"
                    <?= ($active_location_id == $loc->id) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($loc->name) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
<?php else: ?>

    <div class="alert alert-info">

        Current Warehouse:

        <strong>

         <?= htmlspecialchars($currentLocation->name ?? 'Unknown') ?>

        </strong>

    </div>

<?php endif; ?>

<div class="row">

    <!-- SEARCH -->
    <div class="row mb-3">
        <div class="col-md-7">
            <input type="text" id="searchBox" class="form-control" placeholder="Search product name...">
        </div>
        <div class="col-md-5">
            <form method="POST" action="<?= URLROOT ?>/cart/add">
                <input type="text" name="barcode" id="barcodeInput" class="form-control" placeholder="Scan barcode..." autocomplete="off" autofocus>
            </form>
        </div>
    </div>
    <!-- PRODUCTS -->
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">Products</div>
            <div class="card-body">
                <div class="row">

                    <?php foreach ($products as $p) : ?>
                        <div class="col-md-4 mb-3">
                            <form method="POST" action="<?= URLROOT ?>/cart/add">
                                <input type="hidden" name="id" value="<?= $p->id ?>">
                                <input type="hidden" name="unit_type" value="base" class="unit-type">
                                <input type="hidden" name="qty" value="1" class="qty-input">

                                <!-- PRODUCT CLICK = BASE UNIT -->
                                <button type="submit" class="border p-2 product-item w-100 text-start <?= $p->available_qty <= 0 ? 'disabled bg-light text-muted' : '' ?>" <?= $p->available_qty <= 0 ? 'disabled' : '' ?> data-search="<?= strtolower($p->name . ' ' . $p->sku) ?>">
                                    <!-- Show OUT OF STOCK lable -->
                                    <?php if ($p->available_qty <= 0) : ?>
                                        <span class="badge bg-danger">Out of Stock</span>
                                    <?php endif; ?>
                                    <strong class="d-block"><?= htmlspecialchars($p->name) ?></strong><br>
                                    <small>SKU/Barcode: <?= $p->sku ?></small><br>
                                    <small class="text-primary">
                                        <?= number_format($p->price_per_base, 2) ?> / <?= $p->base_unit ?>
                                    </small>
                                    <?php if ($p->units_per_sale > 1) : ?>
                                        <br>
                                        <small class="text-success">
                                            <?= number_format($p->price_per_sale, 2) ?> / <?= $p->sale_unit ?>
                                        </small>
                                    <?php endif; ?>
                                    <br>
                                    <small>
                                        Available:
                                        <?= $p->available_qty ?>
                                        <?= $p->base_unit ?>
                                        <?php if ($p->reserved_qty > 0) : ?>
                                            <span class="text-warning">
                                                (Reserved: <?= $p->reserved_qty ?>)
                                            </span>
                                        <?php endif; ?>
                                    </small>
                                </button>
                                <!-- + ROLL BUTTON -->
                                <?php if ($p->units_per_sale > 1) : ?>
                                    <button type="button" class="btn btn-sm btn-primary w-100 mt-1" onclick="addSaleUnit(this, <?= (int)$p->units_per_sale ?>)">
                                        + 1 <?= $p->sale_unit ?>
                                    </button>
                                <?php endif; ?>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- CART -->
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Cart</div>
            <div class="card-body">
                <?php
                $cart = $_SESSION['cart'] ?? [];
                $total = 0;
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $item) :
                            $qty = (float)$item['qty'];
                            $price = (float)$item['price'];
                            if ($item['unit_type'] === 'sale') {
                                $line = $item['display_qty'] * $item['price']; // whole
                                $item['unit_label'];
                            } else {
                                $line = $item['qty'] * $item['price']; // base units
                            }
                            $total += $line;
                        ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($item['name']) ?><br>

                                    <small class="text-muted">
                                        <?php if ($item['unit_type'] === 'sale') : ?>
                                            <?= $item['display_qty'] ?> <?= $item['sale_unit'] ?>
                                            × <?= number_format($item['price'], 2) ?>
                                        <?php else : ?>
                                            <?= $item['qty'] ?> <?= $item['base_unit'] ?>
                                            × <?= number_format($item['price'], 2) ?>
                                        <?php endif; ?>
                                    </small>
                                </td>
                                <td>
                                    <!-- ✅ Cart form -->
                                    <form method="POST" action="<?= URLROOT ?>/cart/update" class="d-flex gap-1 qty-form">

                                        <input type="hidden" name="id" value="<?= $item['key'] ?>">
                                        <!-- Qty input -->
                                        <input type="number" name="qty" value="<?= $item['display_qty'] ?>" class="qty-field form-control form-control-sm" style="width:90px;" step="1" min="1">
                                        <button type="submit" class="btn btn-sm btn-success">OK</button>
                                    </form>
                                </td>
                                <td><?= number_format($line, 2) ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="<?= URLROOT ?>/cart/remove/<?= $item['key'] ?>">X</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <form method="POST" action="<?= URLROOT ?>/pos/checkout">
                    <h4>Total: LYD <?= number_format($total, 2) ?></h4>
                    <div class="mb-2">
                        <label>Cash</label>
                        <input type="number" step="0.01" name="cash" class="form-control" value="0">
                    </div>
                    <div class="mb-2">
                        <label>Card</label>
                        <input type="number" step="0.01" name="card" class="form-control" value="0">
                    </div>
                    <!-- AUTO PRINT Receipt FROM POS (NO USER INTERACTION) -->
                    <?php if (!empty($_SESSION['print_receipt'])): ?>
                        <script>
                            window.open(
                                "<?= $_SESSION['print_receipt'] ?>",
                                "_blank",
                                "width=400,height=600"
                            );
                        </script>
                    <?php unset($_SESSION['print_receipt']);
                    endif; ?>
                    <button type="submit" class="btn btn-success w-100">
                        Checkout
                    </button>
                    <br><br>
                    <button type="button" onclick="printReceipt()" class="btn btn-secondary w-100">
                        Print Receipt (Test)
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const total = <?= json_encode($total ?? 0) ?>;
        const cash = document.querySelector("input[name='cash']");
        if (cash) cash.value = total.toFixed(2);
    });
</script>
<script>
    function addSaleUnit(btn, unitsPerSale) {
        const form = btn.closest("form");
        const qtyInput = form.querySelector(".qty-input");
        const unitType = form.querySelector(".unit-type");
        if (!qtyInput || !unitType) return;
        unitType.value = "sale";
        qtyInput.value = unitsPerSale;
        form.submit();
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const barcode = document.getElementById("barcodeInput");
        const searchBox = document.getElementById("searchBox");
        const cash = document.querySelector("input[name='cash']");
        const card = document.querySelector("input[name='card']");
        const checkoutBtn = document.querySelector("button[type='submit']");
        const totalAmount = parseFloat(<?= json_encode($total) ?>) || 0;
        if (cash && Number(cash.value) === 0) {
            cash.value = totalAmount.toFixed(2);
        }
        let qtyTimer = null;
        if (barcode) barcode.focus();
        // KEYBOARD CONTROL
        document.addEventListener("keydown", function(e) {

            if (e.key === "Escape") {
                e.preventDefault();
                barcode?.focus();
            }

            if (e.key === "F2") {
                e.preventDefault();
                cash?.focus();
                cash?.select();
            }

            if (e.key === "F3") {
                e.preventDefault();
                card?.focus();
                card?.select();
            }

            if (e.key === "F4") {
                e.preventDefault();
                checkoutBtn?.click();
            }
        });

        // SEARCH FILTER
        if (searchBox) {
            searchBox.addEventListener("input", function() {

                const value = this.value.toLowerCase();

                document.querySelectorAll(".product-item").forEach(item => {
                    const text = item.dataset.search || "";
                    const row = item.closest(".col-md-4");

                    if (row) {
                        row.style.display = text.includes(value) ? "" : "none";
                    }
                });
            });
        }
        // QTY AUTO SUBMIT (CLEAN VERSION)
        document.addEventListener("input", function(e) {

            if (!e.target.classList.contains("qty-field")) return;

            clearTimeout(qtyTimer);

            qtyTimer = setTimeout(() => {
                const form = e.target.closest("form");
                if (form) form.submit();
            }, 400);
        });

        // ENTER support for qty
        document.addEventListener("keydown", function(e) {

            if (e.key === "Enter" && e.target.classList.contains("qty-field")) {
                e.preventDefault();
                e.target.closest("form")?.submit();
            }

        });

    });
</script>

<!-- Load QZ from CDN, should be first -->
<script src="https://cdn.jsdelivr.net/npm/qz-tray@2.2.6/qz-tray.min.js"></script>

<!-- Or saved localy, should be first -->
<!-- <script src="<? //= URLROOT 
                    ?>/assets/qz/qz-tray.js"></script> -->

<script>
    let qzReady = false;
    let qzConnecting = false;

    async function initQZ() {

        if (qzReady || qzConnecting) return;

        qzConnecting = true;

        try {
            if (typeof qz === "undefined") {
                console.error("QZ not loaded");
                return;
            }

            qz.security.setCertificatePromise(resolve => resolve(null));
            qz.security.setSignaturePromise(toSign => resolve => resolve());

            // await qz.websocket.connect();
            qz.websocket.connect({
                host: "localhost"
            });

            console.log("QZ Connected");
            qzReady = true;

        } catch (err) {
            console.error("QZ Connection Error:", err);
        } finally {
            qzConnecting = false;
        }
    }

    document.addEventListener("DOMContentLoaded", initQZ);
</script>

<script>
    let cachedPrinter = null;

    async function getPrinter() {

        if (cachedPrinter) return cachedPrinter;

        const name = localStorage.getItem("pos_printer") || "Microsoft Print to PDF";

        cachedPrinter = await qz.printers.find(name);

        return cachedPrinter;
    }
</script>

<script>
    async function printReceipt() {

        if (!qzReady) {
            alert("Printer not ready. Please wait a few seconds.");
            return;
        }

        const printer = await getPrinter();

        const cart = <?= json_encode($_SESSION['cart'] ?? []) ?>;

        let items = "";
        let total = 0;

        cart.forEach(i => {
            let line = (i.unit_type === "sale") ?
                i.display_qty * i.price :
                i.qty * i.price;

            total += line;

            items += `${i.name}\n${i.qty} x ${i.price} = ${line}\n\n`;
        });

        const data = [{
            type: 'raw',
            format: 'plain',
            data: `MY SHOP
-----------------
${items}
-----------------
TOTAL: ${total.toFixed(2)}`
        }];

        const config = qz.configs.create(printer);

        qz.print(config, data)
            .then(() => console.log("PRINT SENT"))
            .catch(err => console.error("PRINT ERROR:", err));
    }
</script>