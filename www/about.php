<?php
// ---------------------------------------------------------
// Northenbridge College — About
// ---------------------------------------------------------

#require_once __DIR__ . '/init.php';

$stats = [
    ["value" => "1968", "label" => "Founded"],
    ["value" => "11:1", "label" => "Student–faculty ratio"],
    ["value" => "28", "label" => "Undergraduate majors"],
    ["value" => "1,400", "label" => "Students enrolled"],
];

$values = [
    [
        "title" => "Known by name",
        "desc" => "Every student is known to their professors — not a number in a lecture hall.",
    ],
    [
        "title" => "Rigor with care",
        "desc" => "High standards sustained by close mentorship, never by attrition.",
    ],
    [
        "title" => "Purposeful community",
        "desc" => "A compact campus where service, study, and tradition reinforce one another.",
    ],
    [
        "title" => "Curiosity encouraged",
        "desc" => "Research, studio work, and independent projects begin in the first year.",
    ],
];

$year = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About — Northenbridge College</title>
<style>
    :root {
        --ink:        #1c2a24;
        --parchment:  #f6f3ec;
        --hedge:      #2f4a3d;
        --hedge-dark: #203329;
        --brass:      #a97c33;
        --line:       #d9d2c2;
        --muted:      #5b6b62;
        font-size: 16px;
    }

    * { box-sizing: border-box; }

    body {
        margin: 0;
        background: var(--parchment);
        color: var(--ink);
        font-family: "Iowan Old Style", "Palatino Linotype", Georgia, serif;
        line-height: 1.55;
    }

    h1, h2, h3, .brand-word {
        font-family: "Iowan Old Style", Georgia, serif;
        font-weight: 600;
        letter-spacing: 0.01em;
    }

    .sans {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    }

    a { color: inherit; }
    /* ---------- Nav ---------- */
    header.site-nav {
        background: var(--hedge-dark);
        color: var(--parchment);
        border-bottom: 3px solid var(--brass);
    }

    .nav-inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0.9rem 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
    }

    .brand {
        display: flex;
        align-items: baseline;
        gap: 0.5rem;
        text-decoration: none;
        color: var(--parchment);
    }

    .brand-mark {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border: 1.5px solid var(--brass);
        border-radius: 50%;
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--brass);
    }

    .brand-word {
        font-size: 1.25rem;
    }

    .brand-word small {
        display: block;
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.62rem;
        letter-spacing: 0.14em;
        color: #b9c4bb;
        font-weight: 400;
    }

    nav.primary-links {
        display: flex;
        align-items: center;
        gap: 1.75rem;
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.93rem;
    }

    nav.primary-links a {
        text-decoration: none;
        color: #d8ded9;
        padding: 0.3rem 0;
        border-bottom: 2px solid transparent;
        transition: border-color 0.15s ease, color 0.15s ease;
    }

    nav.primary-links a:hover {
        color: #ffffff;
        border-bottom-color: var(--brass);
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 0.9rem;
    }

    .btn-login {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.88rem;
        background: var(--brass);
        color: #221a0d;
        padding: 0.5rem 1.1rem;
        border-radius: 3px;
        text-decoration: none;
        font-weight: 600;
        white-space: nowrap;
        transition: background 0.15s ease;
    }

    .btn-login:hover {
        background: #c19248;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: 1px solid #4b5f54;
        color: var(--parchment);
        font-size: 1.1rem;
        padding: 0.35rem 0.6rem;
        border-radius: 3px;
        cursor: pointer;
    }

    /* ---------- Page hero ---------- */
    .page-hero {
        background: linear-gradient(180deg, var(--hedge) 0%, var(--hedge-dark) 100%);
        color: var(--parchment);
        padding: 3rem 1.5rem 2.6rem;
    }

    .page-hero-inner {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.3fr 1fr;
        gap: 2.5rem;
        align-items: center;
    }

    .page-hero h1 {
        font-size: 2.3rem;
        margin: 0 0 0.8rem;
        line-height: 1.2;
    }

    .hero-motto {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.78rem;
        letter-spacing: 0.12em;
        color: var(--brass);
        margin-bottom: 0.6rem;
    }

    .page-hero p.lede {
        font-size: 1.05rem;
        color: #dfe6e1;
        max-width: 46ch;
        margin: 0;
    }

    .hero-panel {
        border: 1px solid #46594e;
        background: rgba(255,255,255,0.03);
        padding: 1.5rem;
        border-radius: 4px;
    }

    .hero-panel blockquote {
        margin: 0;
        font-style: italic;
        color: #e5e9e6;
    }

    .hero-panel cite {
        display: block;
        margin-top: 0.7rem;
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.82rem;
        font-style: normal;
        color: var(--brass);
    }

    /* ---------- Stats ---------- */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
    }

    .stat {
        text-align: center;
        border: 1px solid var(--line);
        background: #fffdf8;
        padding: 1.4rem 1rem;
        border-radius: 3px;
        border-top: 3px solid var(--brass);
    }

    .stat-value {
        font-family: "Iowan Old Style", Georgia, serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--hedge-dark);
        line-height: 1.1;
    }

    .stat-label {
        margin-top: 0.4rem;
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.82rem;
        color: var(--muted);
    }

    /* ---------- Section ---------- */
    .section {
        max-width: 1100px;
        margin: 0 auto;
        padding: 3rem 1.5rem 3.5rem;
    }

    .section-head {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        border-bottom: 1px solid var(--line);
        padding-bottom: 0.7rem;
        margin-bottom: 1.6rem;
    }

    .section-head h2 {
        font-size: 1.5rem;
        margin: 0;
        color: var(--hedge-dark);
    }

    .section-head a {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.88rem;
        text-decoration: none;
        color: var(--hedge);
        border-bottom: 1px solid var(--hedge);
    }

    /* ---------- Story ---------- */
    .story p {
        font-size: 1.02rem;
        color: #3c4841;
        margin: 0 0 1rem;
    }

    .story p:last-child { margin-bottom: 0; }

    /* ---------- Values ---------- */
    .value-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    .value-card {
        border: 1px solid var(--line);
        background: #fffdf8;
        padding: 1.3rem 1.4rem;
        border-radius: 3px;
        border-left: 3px solid var(--brass);
    }

    .value-card h3 {
        font-size: 1.1rem;
        margin: 0 0 0.5rem;
        color: var(--hedge-dark);
    }

    .value-card p {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.89rem;
        color: var(--muted);
        margin: 0;
    }
    
    /* ---------- Footer ---------- */
    footer {
        background: var(--hedge-dark);
        color: #b9c4bb;
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.83rem;
    }

    .footer-inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 860px) {
        .page-hero-inner { grid-template-columns: 1fr; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .value-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 560px) {
        .stats-grid { grid-template-columns: 1fr; }
        .page-hero h1 { font-size: 1.9rem; }
    }

    @media (prefers-reduced-motion: reduce) {
        * { transition: none !important; }
    }

    :focus-visible {
        outline: 2px solid var(--brass);
        outline-offset: 2px;
    }
</style>
</head>
<body>
<header class="site-nav">
    <div class="nav-inner">
        <a href="index.php" class="brand">
            <span class="brand-mark">NC</span>
            <span class="brand-word">Northenbridge<small>COLLEGE</small></span>
        </a>

        <nav class="primary-links">
            <a href="academics.php">Academics</a>
            <a href="admissions.php">Admissions</a>
            <a href="events.php">Events</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </nav>

        <div class="nav-actions">
            <a href="login.php" class="btn-login">Student Login</a>
            <button class="menu-toggle" aria-label="Open menu">☰</button>
        </div>
    </div>
</header>


<section class="page-hero">
    <div class="page-hero-inner">
        <div>
            <div class="hero-motto sans">ABOUT NORTHENBRIDGE</div>
            <h1>A College That Knows Its Students</h1>
            <p class="lede">Northenbridge College is a small, residential college founded in 1968 on the belief that careful teaching and close community produce graduates of unusual depth.</p>
        </div>
        <div class="hero-panel">
            <blockquote>“Established in purpose, built on rigor — a college where every student is known by name.”</blockquote>
            <cite>— College motto</cite>
        </div>
    </div>
</section>

<section class="section">
    <div class="stats-grid">
        <?php foreach ($stats as $s): ?>
        <div class="stat">
            <div class="stat-value"><?php echo htmlspecialchars($s['value']); ?></div>
            <div class="stat-label"><?php echo htmlspecialchars($s['label']); ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="section-head">
        <h2>Our Story</h2>
    </div>
    <div class="story">
        <p>Northenbridge College was established in <?php echo $year - 58; ?> as a small liberal arts institution on a wooded campus outside the city. From the first graduating class of forty-two students, the college committed to something deliberately unfashionable: small classes, faculty who stay, and a curriculum that treats students as scholars in training rather than seats to fill.</p>
        <p>Today that commitment is unchanged. We enroll roughly 1,400 undergraduates across five schools, keep the student–faculty ratio at 11 to 1, and require every student to complete an independent capstone before graduation. The campus has grown — the Innovation Building, the new sciences complex, and Whitfield Field all postdate the original quad — but the scale has not.</p>
        <p>What you will find here is straightforward: disciplined coursework, genuine mentorship, and a community that notices when you are absent.</p>
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="section-head">
        <h2>What We Value</h2>
        <a href="academics.php">See our programs</a>
    </div>
    <div class="value-grid">
        <?php foreach ($values as $v): ?>
        <div class="value-card">
            <h3><?php echo htmlspecialchars($v['title']); ?></h3>
            <p><?php echo htmlspecialchars($v['desc']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<footer>
    <div class="footer-inner">
        <span>&copy; <?php echo $year; ?> Northenbridge College</span>
        <span>18 Whitfield Lane · Northenbridge</span>
    </div>
</footer>

 </body>
</html>