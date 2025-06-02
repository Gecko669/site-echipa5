<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission - John Doe</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="css/uikit.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- UIkit JS -->
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="index.html">John Doe</a>
            </div>
            
            <div class="uk-navbar-right uk-visible@m">
                <ul class="uk-navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            
            <div class="uk-navbar-right uk-hidden@m">
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
    
    <!-- Form Submission Section -->
    <section class="uk-section uk-section-default">
        <div class="uk-container">
            <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto uk-box-shadow-medium">
                <h1 class="uk-card-title uk-text-center">Form Submission</h1>
                
                <?php
                // Include mail.php to process the form data
                include 'mail.php';
                
                // Check if form was submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Display success alert
                    echo '<div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <h3>Thank You!</h3>
                        <p>Your message has been received. I will get back to you as soon as possible.</p>
                    </div>';
                    
                    // Display the form data
                    echo '<div class="uk-margin-medium-top">';
                    echo '<h3>Submitted Information:</h3>';
                    echo '<dl class="uk-description-list uk-description-list-divider">';
                    
                    // Name
                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                        echo '<dt>Name:</dt>';
                        echo '<dd>' . htmlspecialchars($_POST['name']) . '</dd>';
                    }
                    
                    // Email
                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                        echo '<dt>Email:</dt>';
                        echo '<dd>' . htmlspecialchars($_POST['email']) . '</dd>';
                    }
                    
                    // Phone
                    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                        echo '<dt>Phone:</dt>';
                        echo '<dd>' . htmlspecialchars($_POST['phone']) . '</dd>';
                    }
                    
                    // Subject
                    if (isset($_POST['subject']) && !empty($_POST['subject'])) {
                        echo '<dt>Subject:</dt>';
                        echo '<dd>' . htmlspecialchars($_POST['subject']) . '</dd>';
                    }
                    
                    // Message
                    if (isset($_POST['message']) && !empty($_POST['message'])) {
                        echo '<dt>Message:</dt>';
                        echo '<dd>' . nl2br(htmlspecialchars($_POST['message'])) . '</dd>';
                    }
                    
                    // Newsletter
                    if (isset($_POST['newsletter']) && $_POST['newsletter'] == 'subscribe') {
                        echo '<dt>Newsletter:</dt>';
                        echo '<dd>Subscribed</dd>';
                    } else {
                        echo '<dt>Newsletter:</dt>';
                        echo '<dd>Not subscribed</dd>';
                    }
                    
                    echo '</dl>';
                    echo '</div>';
                } else {
                    // If the page is accessed directly without form submission
                    echo '<div class="uk-alert-warning" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <h3>No Form Submission</h3>
                        <p>This page displays form submissions. Please complete the <a href="contact.html">contact form</a> to see results here.</p>
                    </div>';
                }
                ?>
                
                <div class="uk-margin-medium-top uk-text-center">
                    <a href="contact.html" class="uk-button uk-button-primary">Back to Contact Form</a>
                    <a href="index.html" class="uk-button uk-button-default uk-margin-left">Go to Homepage</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="uk-section uk-section-default uk-padding-small">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                <div>
                    <h4>John Doe</h4>
                    <p>Professional web developer and designer focused on creating beautiful, functional websites.</p>
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
                    <h4>Contact Info</h4>
                    <ul class="uk-list">
                        <li><span uk-icon="icon: mail"></span> johndoe@example.com</li>
                        <li><span uk-icon="icon: receiver"></span> +1 234 567 890</li>
                        <li><span uk-icon="icon: location"></span> New York, USA</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="uk-text-center">
                <p>&copy; 2025 John Doe. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- To Top Button -->
    <a href="#" class="uk-totop uk-position-fixed uk-position-bottom-right uk-margin-medium-right uk-margin-medium-bottom" uk-totop uk-scroll></a>
</body>
</html>