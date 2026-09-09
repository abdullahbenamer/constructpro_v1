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
        <?= __('customer_information') ?>
    </title>

</head>

<body>

    <div class="row">

        <div class="col-md-12">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h2>

                    <i class="fas fa-building"></i>

                    <?= __('customer_information') ?>

                </h2>


                <div>

                    <a
                        href="<?= URLROOT ?>/customers/edit/<?= $customer->id ?>"
                        class="btn btn-warning">

                        <i class="fas fa-edit"></i>

                        <?= __('edit') ?>

                    </a>


                    <a
                        href="<?= URLROOT ?>/customers"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>

                        <?= __('back') ?>

                    </a>

                </div>

            </div>


            <div class="card shadow-sm">

                <div class="card-body">

                    <div class="row">


                        <!-- COMPANY INFORMATION -->

                        <div class="col-md-6">

                            <h5 class="border-bottom pb-2">

                                <?= __('company_information') ?>

                            </h5>


                            <p>

                                <strong>
                                    <?= __('company') ?>:
                                </strong>

                                <br>

                                <?= htmlspecialchars(
                                    $customer->company
                                ) ?>

                            </p>


                            <p>

                                <strong>
                                    <?= __('status') ?>:
                                </strong>

                                <br>

                                <span class="badge bg-success">

                                    <?= __('active') ?>

                                </span>

                            </p>

                        </div>


                        <!-- CONTACT INFORMATION -->

                        <div class="col-md-6">

                            <h5 class="border-bottom pb-2">

                                <?= __('contact_information') ?>

                            </h5>


                            <p>

                                <strong>
                                    <?= __('contact_person') ?>:
                                </strong>

                                <br>

                                <?= htmlspecialchars(
                                    $customer->name
                                ) ?>

                            </p>


                            <p>

                                <strong>
                                    <?= __('email') ?>:
                                </strong>

                                <br>

                                <a
                                    href="mailto:<?= $customer->email ?>">

                                    <?= htmlspecialchars(
                                        $customer->email
                                    ) ?>

                                </a>

                            </p>


                            <p>

                                <strong>
                                    <?= __('phone') ?>:
                                </strong>

                                <br>

                                <?= htmlspecialchars(
                                    $customer->phone
                                ) ?>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>