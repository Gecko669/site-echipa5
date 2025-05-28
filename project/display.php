<?php
// Get form data
$name = htmlspecialchars($_POST['name'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$subject = htmlspecialchars($_POST['subject'] ?? '');
$message = htmlspecialchars($_POST['message'] ?? '');
$service = htmlspecialchars($_POST['service'] ?? '');
$source = htmlspecialchars($_POST['source'] ?? '');
$newsletter = isset($_POST['newsletter']) ? 'Yes' : 'No';

// Validate form data
$errors = [];

if (empty($name)) {
    $errors[] = "Name is required";
}

if (empty($email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

if (empty($subject)) {
    $errors[] = "Subject is required";
}

if (empty($message)) {
    $errors[] = "Message is required";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Received - Alex Morgan</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="css/uikit.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- UIkit JS -->
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</head>
<body>
    <!-- Navigation -->
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left uk-margin-left">
                <a href="index.html" class="uk-navbar-item uk-logo">
                    <span uk-icon="icon: bolt; ratio: 1.2"></span>
                    <span class="uk-margin-small-left">Alex Morgan</span>
                </a>
            </div>
            <div class="uk-navbar-right uk-visible@m uk-margin-right">
                <ul class="uk-navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="uk-navbar-right uk-hidden@m uk-margin-right">
                <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#" uk-toggle="target: #offcanvas-nav"></a>
            </div>
        </nav>
    </div>

    <!-- Off-canvas Menu -->
    <div id="offcanvas-nav" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <ul class="uk-nav uk-nav-default">
                <li><a href="index.html">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </div>

    <!-- Form Results -->
    <section class="uk-section uk-section-default">
        <div class="uk-container">
            <?php if (!empty($errors)): ?>
                <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <h3>Please correct the following errors:</h3>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p><a href="contact.html" class="uk-button uk-button-default">Go Back</a></p>
                </div>
            <?php else: ?>
                <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <h3>Thank you for your message!</h3>
                    <p>I'll get back to you as soon as possible.</p>
                </div>

                <div class="uk-card uk-card-default uk-card-body uk-width-1-1 uk-margin-top">
                    <h2 class="uk-card-title">Your Submission</h2>
                    <table class="uk-table uk-table-divider">
                        <tbody>
                            <tr>
                                <th class="uk-width-small">Name:</th>
                                <td><?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <th>Subject:</th>
                                <td><?php echo $subject; ?></td>
                            </tr>
                            <tr>
                                <th>Message:</th>
                                <td><?php echo nl2br($message); ?></td>
                            </tr>
                            <?php if (!empty($service)): ?>
                            <tr>
                                <th>Service:</th>
                                <td><?php echo $service; ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (!empty($source)): ?>
                            <tr>
                                <th>Source:</th>
                                <td><?php echo $source; ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th>Newsletter:</th>
                                <td><?php echo $newsletter; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="uk-margin-top uk-text-center">
                        <a href="index.html" class="uk-button uk-button-primary">Return to Home</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="uk-section uk-section-small uk-section-muted">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                <div>
                    <h4>Alex Morgan</h4>
                    <p>Web Developer & UI/UX Designer based in New York. Creating beautiful, functional websites and applications since 2018.</p>
                </div>
                <div>
                    <h4>Quick Links</h4>
                    <ul class="uk-list uk-list-divider">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Contact</h4>
                    <ul class="uk-list">
                        <li><span uk-icon="icon: mail"></span> <a href="mailto:contact@alexmorgan.com">contact@alexmorgan.com</a></li>
                        <li><span uk-icon="icon: receiver"></span> +1 (555) 123-4567</li>
                        <li><span uk-icon="icon: location"></span> New York, NY</li>
                    </ul>
                    <div class="uk-margin-top">
                        <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
                        <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
                        <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
                        <a href="#" class="uk-icon-button" uk-icon="linkedin"></a>
                    </div>
                </div>
            </div>
            <div class="uk-margin-medium-top uk-text-center">
                <p>&copy; 2025 Alex Morgan. All rights reserved.</p>
                <a href="#" uk-totop uk-scroll class="uk-margin-small-left"></a>
            </div>
        </div>
    </footer>
</body>
</html>