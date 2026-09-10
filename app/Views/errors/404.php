<html
    lang="<?= htmlspecialchars(Language::get()) ?>"
    dir="<?= htmlspecialchars(Language::direction()) ?>">

<head>

    <meta charset="UTF-8">

    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        <?= __('error_404') ?>
    </title>

</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6 text-center">

            <h1 class="display-1 text-muted">
                404
            </h1>

            <h2>
                <?= __('page_not_found') ?>
            </h2>

            <p class="lead">
                <?= __('page_does_not_exist') ?>
            </p>

            <a
                href="<?= URLROOT ?>/dashboard"
                class="btn btn-primary btn-lg">

                <i class="fas fa-home"></i>

                <?= __('go_to_dashboard') ?>

            </a>

        </div>

    </div>

</div>

</body>

</html>