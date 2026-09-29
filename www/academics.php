<?php
// ---------------------------------------------------------
// Northenbridge College — Academics
// ---------------------------------------------------------


$schools = [
    [
        "name" => "School of Engineering",
        "majors" => ["Computer Science", "Software Engineering", "Civil Engineering", "Mechanical Engineering"],
    ],
    [
        "name" => "School of Information Technology",
        "majors" => ["Information Technology", "Cybersecurity", "Data Science"],
    ],
    [
        "name" => "School of Arts & Humanities",
        "majors" => ["English Literature", "History", "Philosophy", "Studio Arts"],
    ],
    [
        "name" => "School of Science",
        "majors" => ["Biology", "Chemistry", "Physics", "Mathematics"],
    ],
    [
        "name" => "School of Business",
        "majors" => ["Business Administration", "Accounting", "Economics", "Marketing"],
    ],
];

$highlights = [
    [
        "title" => "5 Schools, 28 Majors",
        "desc" => "Undergraduate programs across engineering, technology, arts, science, and business.",
    ],
    [
        "title" => "11:1 Student–Faculty Ratio",
        "desc" => "Small seminar sizes and close mentorship on every course track.",
    ],
    [
        "title" => "Hands-On Curriculum",
        "desc" => "Lab work, studio critique, and applied projects in every major.",
    ],
    [
        "title" => "Senior Capstones",
        "desc" => "Every graduate completes an independent capstone project or thesis.",
    ],
];

$year = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Academics — Northenbridge College</title>
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
        max-width: 60ch;
        margin: 0;
    }

    /* ---------- Sections ---------- */
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

    /* ---------- Highlights ---------- */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
    }

    .card {
        border: 1px solid var(--line);
        background: #fffdf8;
        padding: 1.2rem;
        border-radius: 3px;
        border-top: 3px solid var(--hedge);
    }

    .card h3 {
        font-size: 1.05rem;
        margin: 0 0 0.5rem;
        color: var(--hedge-dark);
    }

    .card p {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.87rem;
        color: var(--muted);
        margin: 0;
    }

    /* ---------- Schools ---------- */
    .school-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    .school-card {
        border: 1px solid var(--line);
        background: #fffdf8;
        padding: 1.4rem;
        border-radius: 3px;
        border-left: 3px solid var(--brass);
    }

    .school-card h3 {
        font-size: 1.15rem;
        margin: 0 0 0.8rem;
        color: var(--hedge-dark);
    }

    .school-card ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        gap: 0.45rem;
    }

    .school-card li {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.82rem;
        color: var(--hedge);
        background: #f0ece2;
        padding: 0.28rem 0.7rem;
        border-radius: 12px;
    }

    /* ---------- Academic calendar strip ---------- */
    .note-strip {
        background: var(--parchment);
        border-bottom: 1px solid var(--line);
        border-top: 1px solid var(--line);
    }

    .note-strip-inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0.85rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.93rem;
    }

    .note-tag {
        flex-shrink: 0;
        color: var(--hedge);
        font-weight: 700;
        border-right: 1px solid var(--line);
        padding-right: 0.8rem;
    }
    
    .note-strip-inner p { margin: 0; color: #3c4841; }
    
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
        .card-grid { grid-template-columns: repeat(2, 1fr); }
        .school-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 560px) {
        .card-grid { grid-template-columns: 1fr; }
        .page-hero h1 { font-size: 1.9rem; }
        .note-strip-inner { flex-direction: column; align-items: flex-start; }
        .note-tag { border-right: none; padding-right: 0; }
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
        <div class="hero-motto sans">ACADEMICS</div>
        <h1>Programs &amp; Schools</h1>
        <p class="lede">Twenty-eight majors across five schools, built around small classes, rigorous coursework, and mentorship that follows you from first year to capstone.</p>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Why Study Here</h2>
        <a href="admissions.php">Apply now</a>
    </div>
    <div class="card-grid">
        <?php foreach ($highlights as $h): ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($h['title']); ?></h3>
            <p><?php echo htmlspecialchars($h['desc']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="note-strip">
    <div class="note-strip-inner">
        <span class="note-tag">Fall <?php echo $year; ?></span>
        <p>Registration opens August 20. New students enroll through the student portal after completing admission.</p>
    </div>
</div>

<section class="section">
    <div class="section-head">
        <h2>Schools &amp; Majors</h2>
    </div>
    <div class="school-grid">
        <?php foreach ($schools as $school): ?>
        <div class="school-card">
            <h3><?php echo htmlspecialchars($school['name']); ?></h3>
            <ul>
                <?php foreach ($school['majors'] as $major): ?>
                <li><?php echo htmlspecialchars($major); ?></li>
                <?php endforeach; ?>
            </ul>
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