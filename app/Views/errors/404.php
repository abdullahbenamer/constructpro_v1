
<!DOCTYPE html>
<html
    lang="<?= htmlspecialchars(Language::get(), ENT_QUOTES, 'UTF-8') ?>"
    dir="<?= htmlspecialchars(Language::direction(), ENT_QUOTES, 'UTF-8') ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars(__('error_404'), ENT_QUOTES, 'UTF-8') ?></title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f4f7fb 0%, #e9eff7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .error-card {
            width: 100%;
            max-width: 680px;
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 15px 45px rgba(31, 45, 61, 0.08);
        }

        .error-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #edf4ff;
            color: #0d6efd;
            font-size: 2.5rem;
        }

        .error-code {
            font-size: clamp(5rem, 15vw, 8rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -4px;
            color: #0d6efd;
            margin-bottom: 1rem;
        }

        .error-title {
            font-weight: 700;
            color: #253247;
        }

        .error-description {
            color: #6c757d;
            max-width: 460px;
            margin: 1rem auto 2rem;
            line-height: 1.8;
        }

        .home-button {
            border-radius: 10px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
        }

        @media (max-width: 576px) {
            .error-card {
                padding: 2.5rem 1.25rem;
                margin: 1rem;
            }
        }
    </style>
</head>

<body>

    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12">

                <section class="error-card text-center mx-auto">

                    <div class="error-icon">
                        <i class="fa-solid fa-map-location-dot"
                           aria-hidden="true"></i>
                    </div>

                    <div class="error-code">404</div>

                    <h1 class="h3 error-title">
                        <?= htmlspecialchars(__('page_not_found'), ENT_QUOTES, 'UTF-8') ?>
                    </h1>

                    <p class="error-description">
                        <?= htmlspecialchars(__('page_does_not_exist'), ENT_QUOTES, 'UTF-8') ?>
                    </p>

                    <a
                        href="<?= htmlspecialchars(URLROOT . '/dashboard', ENT_QUOTES, 'UTF-8') ?>"
                        class="btn btn-primary btn-lg home-button">

                        <i class="fa-solid fa-house me-2"
                           aria-hidden="true"></i>

                        <?= htmlspecialchars(__('go_to_dashboard'), ENT_QUOTES, 'UTF-8') ?>
                    </a>

                    <div class="mt-4 small text-muted">
                        ConstructPro
                    </div>

                </section>

            </div>
        </div>
    </main>

</body>
</html>
