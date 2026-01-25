<?php
$site = site_config();
?>
</main>
<footer class="site-footer">
    <div class="footer-cta">
        <div class="container footer-cta-inner">
            <div>
                <h2>Ready to plan a secure, enterprise-grade delivery?</h2>
                <p>Book a call with a UK delivery lead or request a fixed-scope proposal aligned to your governance requirements.</p>
            </div>
            <div class="footer-cta-buttons">
                <a class="btn btn-primary" href="<?= site_url('/contact/') ?>">Book a call</a>
                <a class="btn btn-secondary" href="<?= site_url('/contact/') ?>">Get a quote</a>
            </div>
        </div>
    </div>
    <div class="container footer-links">
        <div>
            <h3>Company</h3>
            <a href="<?= site_url('/about/') ?>">About</a>
            <a href="<?= site_url('/how-we-work/') ?>">How We Work</a>
            <a href="<?= site_url('/careers/') ?>">Careers</a>
            <a href="<?= site_url('/contact/') ?>">Contact</a>
            <a href="<?= site_url('/security/') ?>">Security</a>
            <a href="<?= site_url('/sitemap/') ?>">Sitemap</a>
        </div>
        <div>
            <h3>Services</h3>
            <a href="<?= site_url('/services/mobile-app-development/') ?>">Mobile App Development</a>
            <a href="<?= site_url('/services/web-application-development/') ?>">Web Application Development</a>
            <a href="<?= site_url('/services/legacy-software-modernisation/') ?>">Legacy Modernisation</a>
            <a href="<?= site_url('/services/software-cybersecurity/') ?>">Software Cybersecurity</a>
            <a href="<?= site_url('/services/code-rescue/') ?>">Code Rescue</a>
        </div>
        <div>
            <h3>Technologies</h3>
            <a href="<?= site_url('/technologies/cloud-solutions/') ?>">Cloud Solutions</a>
            <a href="<?= site_url('/technologies/artificial-intelligence-machine-learning/') ?>">AI & ML</a>
            <a href="<?= site_url('/technologies/mobile-application/') ?>">Mobile Application</a>
            <a href="<?= site_url('/technologies/digital-transformation-and-it-consulting/') ?>">IT Consulting</a>
            <a href="<?= site_url('/services/technologies/') ?>">All Technologies</a>
        </div>
        <div>
            <h3>Industries</h3>
            <a href="<?= site_url('/industries/financial/') ?>">Financial Services</a>
            <a href="<?= site_url('/industries/healthcare/') ?>">Healthcare</a>
            <a href="<?= site_url('/industries/insurance/') ?>">Insurance</a>
            <a href="<?= site_url('/industries/education/') ?>">Education</a>
            <a href="<?= site_url('/services/industries/') ?>">All Industries</a>
        </div>
        <div>
            <h3>Contact</h3>
            <p>Phone: <?= htmlspecialchars($site['phone']) ?></p>
            <p>Email: <a href="mailto:<?= htmlspecialchars($site['emails']['info']) ?>"><?= htmlspecialchars($site['emails']['info']) ?></a></p>
            <p>Support: <a href="mailto:<?= htmlspecialchars($site['emails']['support']) ?>"><?= htmlspecialchars($site['emails']['support']) ?></a></p>
            <p>Address: <?= htmlspecialchars($site['address']) ?></p>
        </div>
    </div>
    <div class="container footer-trust">
        <div class="trust-item">
            <img src="<?= asset_url('assets/icons/uk.svg') ?>" alt="UK-based icon">
            <span>UK-based delivery teams</span>
        </div>
        <div class="trust-item">
            <img src="<?= asset_url('assets/icons/secure.svg') ?>" alt="Secure delivery icon">
            <span>Secure delivery and compliance</span>
        </div>
        <div class="trust-item">
            <img src="<?= asset_url('assets/icons/quality.svg') ?>" alt="Quality-first icon">
            <span>Quality-first engineering</span>
        </div>
        <div class="trust-item">
            <img src="<?= asset_url('assets/icons/support.svg') ?>" alt="Support icon">
            <span>Long-term support and optimisation</span>
        </div>
    </div>
    <div class="container footer-bottom">
        <div class="footer-newsletter">
            <h3>Enterprise delivery updates</h3>
            <p>Monthly insights for UK technology leaders. No spam, just practical guidance.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Work email">
                <button class="btn btn-secondary" type="button">Subscribe</button>
            </form>
        </div>
        <div class="footer-social">
            <h3>Connect</h3>
            <div class="social-icons">
                <a href="https://www.linkedin.com" aria-label="LinkedIn"><img src="<?= asset_url('assets/icons/linkedin.svg') ?>" alt="LinkedIn"></a>
                <a href="https://www.twitter.com" aria-label="Twitter"><img src="<?= asset_url('assets/icons/twitter.svg') ?>" alt="Twitter"></a>
                <a href="https://www.youtube.com" aria-label="YouTube"><img src="<?= asset_url('assets/icons/youtube.svg') ?>" alt="YouTube"></a>
            </div>
        </div>
        <div class="footer-legal">
            <p><?= htmlspecialchars($site['company_legal']) ?></p>
            <p>Brand icons provided by Simple Icons.</p>
            <p><a href="<?= site_url('/privacy-policy/') ?>">Privacy Policy</a> · <a href="<?= site_url('/cookie-policy/') ?>">Cookie Policy</a> · <a href="<?= site_url('/terms/') ?>">Terms</a> · <a href="<?= site_url('/accessibility/') ?>">Accessibility</a></p>
        </div>
    </div>
</footer>
<div class="cookie-banner">
    <h3>Cookie consent</h3>
    <p>We use essential cookies for security and to remember your preferences.</p>
    <button class="btn btn-primary cookie-accept" type="button">Accept</button>
</div>
<script src="<?= asset_url('assets/js/main.js') ?>"></script>
</body>
</html>
