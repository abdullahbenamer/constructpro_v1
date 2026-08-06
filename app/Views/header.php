<?php
$role_id = $_SESSION['role_id'] ?? null;
$role_name = $_SESSION['role_name'] ?? '';
?>
<!-- global Bootstrap alert block -->
<?php if (!empty($_SESSION['success'])) : ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= $_SESSION['success'] ?>
        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= $_SESSION['error'] ?>
        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['warning'])) : ?>
    <div class="alert alert-warning alert-dismissible fade show">
        <?= $_SESSION['warning'] ?>
        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['warning']); ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Construction Professional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
   
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="<?= URLROOT ?>/">
                <i class="fas fa-city"></i>
                ConstructPro System <i class="fas fa-drafting-compass"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            //avoid repeating isset()
            $role_id = $_SESSION['role_id'] ?? null; ?>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <?php if (AuthHelper::canView('dashboard.view')) : ?>

                        <li class="nav-item">

                            <a class="nav-link <?= App::$current_url == 'dashboard' ? 'active' : '' ?>" href="<?= URLROOT ?>/dashboard">

                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard

                            </a>

                        </li>

                    <?php endif; ?>
                    <?php if (AuthHelper::canView('projects.view') || AuthHelper::canView('customers.view')) : ?>

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle"
                                href="#"
                                id="projectsDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">

                                <i class="fas fa-project-diagram"></i> Projects
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="projectsDropdown">

                                <?php if (AuthHelper::canView('projects.view')) : ?>
                                    <li>
                                        <a class="dropdown-item <?= App::$current_url == 'projects' ? 'active' : '' ?>"
                                            href="<?= URLROOT ?>/projects">
                                            <i class="fas fa-project-diagram"></i> Projects
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (AuthHelper::canView('projects.view')) : ?>
                                    <li>
                                        <a class="dropdown-item <?= App::$current_url == 'ResourceRequisitions' ? 'active' : '' ?>"
                                            href="<?= URLROOT ?>/ResourceRequisitions">
                                            <i class="fas fa-file"></i> Resource Requisitions
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (AuthHelper::canView('customers.view')) : ?>
                                    <li>
                                        <a class="dropdown-item <?= App::$current_url == 'customers' ? 'active' : '' ?>"
                                            href="<?= URLROOT ?>/customers">
                                            <i class="fas fa-users"></i> Customers
                                        </a>
                                    </li>
                                <?php endif; ?>



                            </ul>
                        </li>

                    <?php endif; ?>

                    <?php if (
                        AuthHelper::canView('inventory.view') ||
                        AuthHelper::canView('inventory-movements.view') ||
                        AuthHelper::canView('inventory-locations.view') ||
                        AuthHelper::canView('stock-transfers.view') ||
                        AuthHelper::canView('inventory-reservations.view')
                    ) : ?>

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">

                                <i class="fas fa-warehouse"></i>
                                Inventory

                            </a>

                            <ul class="dropdown-menu">

                                <?php if (AuthHelper::canView('inventory.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/inventory">

                                            <i class="fas fa-boxes"></i>
                                            Inventory List

                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (AuthHelper::canView('inventory-locations.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/inventory-locations">

                                            <i class="fas fa-map-marker-alt"></i>
                                            Locations (WareHouse)

                                        </a>
                                    </li>
                                <?php endif; ?>


                                <!-- Receive Stock moved to procurement -->
                                <!-- <?php //if (AuthHelper::canView('inventory-movements.create')) : 
                                        ?>
                                    <li>
                                        <a class="dropdown-item" href="<? //= URLROOT 
                                                                        ?>/inventory-movements/receive">

                                            <i class="fas fa-truck-loading"></i>
                                            Receive Stock (from PO)

                                        </a>
                                    </li>
                                <?php //endif; 
                                ?> -->


                                <?php if (AuthHelper::canView('inventory-reservations.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/inventoryreservations">

                                            <i class="fas fa-lock"></i>
                                            Material Reservations
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (AuthHelper::canView('inventory-transfers.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/inventory-transfers">

                                            <i class="fas fa-random"></i>
                                            Stock Transfers

                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (AuthHelper::canView('inventory-movements.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/inventory-movements">

                                            <i class="fas fa-exchange-alt"></i>
                                            Stock Movements (Report)

                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>

                    <!-- Procurement -->
                    <?php if (
                        AuthHelper::canView('purchase-orders.view') ||
                        AuthHelper::canView('suppliers.view')
                    ) : ?>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">

                                <i class="fas fa-shopping-cart"></i>
                                Procurement

                            </a>
                            <ul class="dropdown-menu">

                                <?php if (AuthHelper::canView('purchase-orders.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/purchaseorders">

                                            <i class="fas fa-file-invoice"></i>
                                            Purchase Orders
                                        </a>
                                    </li>
                                <?php endif; ?>


                                <?php if (AuthHelper::canView('inventory-movements.create')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/inventory-movements/receive">

                                            <i class="fas fa-truck-loading"></i>
                                            Receive Stock (from PO)

                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (AuthHelper::canView('suppliers.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/suppliers">
                                            <i class="fas fa-truck"></i>
                                            Suppliers

                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                    <?php endif; ?>
                    <?php if (AuthHelper::canView('services.view')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT ?>/services">
                                <i class="fas fa-tools"></i> Services
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Finance -->
                    <?php if (AuthHelper::canView('finance.view')) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-coins"></i> Finance
                            </a>
                            <ul class="dropdown-menu">

                                <?php if (AuthHelper::canView('costs.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/costs">
                                            Project Costs
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (AuthHelper::canView('reports.view')) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= URLROOT ?>/reports">
                                            Reports
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>

                    <!-- POS --->
                    <!-- <?php //if (AuthHelper::canView('pos.view')) : 
                            ?>
                        <li class="nav-item">
                            <a class="nav-link <? //= App::$current_url == 'pos' ? 'active' : '' 
                                                ?>" href="<? //= URLROOT 
                                                            ?>/pos">
                                <i class="fas fa-cash-register"></i> POS
                            </a>
                        </li>
                    <?php //endif; 
                    ?>               -->
                    <li><?php if (isset($_SESSION['user_id'])) : ?>
                            <a href="<?= URLROOT ?>/auth/logout" class="btn btn-danger btn-sm">
                                Logout
                            </a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_name'])) : ?>
                            <span class="nav-link text-light">
                                <i class="fas fa-user-circle"></i> <?= $_SESSION['user_name'] ?> (<?= $role_name ?>)
                            </span>
                        <?php endif; ?>
                    </li>
                    <!-- Show User Admin Panel if the logged in is ADMIN role -->
                    <li><?php if (AuthHelper::canView('admin.access')) : ?>
                            <a class="nav-link" href="<?= URLROOT ?>/admin">Admin Panel</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navigation bar -->

    <!-- Company Logo -->
    <div class="d-flex align-items-center mt-4 ms-4">
        <?php if (!empty($settings->logo)): ?>
            <img src="<?= URLROOT ?>/<?= $settings->logo ?>"
                style="height:100px; margin-right:10px;">
        <?php endif; ?>

        <div style="font-family: 'Tajawal', 'Roboto', sans-serif;">
            <strong class="fs-4"><?= htmlspecialchars($settings->company_name) ?></strong>
            <br>
            <i class="fas fa-location-dot"></i> <small><?= htmlspecialchars($settings->address) ?></small>
            <br>
            <i class="fas fa-mobile"></i> <small><?= htmlspecialchars($settings->contacts) ?></small>
        </div>
    </div>
    <div class="container mt-4">