<?php
// ---------------------------------------------------------
// Northenbridge College — Events Calendar
// ---------------------------------------------------------



$events = [
    [
        "title" => "Fall Open House",
        "date"  => "Sept 20, 2026",
        "time"  => "10:00 AM – 2:00 PM",
        "loc"   => "Main Quad",
        "cat"   => "Campus Visit",
        "desc"  => "Tour the campus, meet faculty, and sit in on a live lecture in the sciences building.",
    ],
    [
        "title" => "Founders' Day Lecture",
        "date"  => "Sept 27, 2026",
        "time"  => "6:00 PM",
        "loc"   => "Whitfield Auditorium",
        "cat"   => "Lecture",
        "desc"  => "Alumna Dr. Priya Menon returns to campus to speak on climate resilience engineering.",
    ],
    [
        "title" => "Career & Internship Fair",
        "date"  => "Oct 3, 2026",
        "time"  => "11:00 AM – 4:00 PM",
        "loc"   => "The Commons",
        "cat"   => "Careers",
        "desc"  => "Over 40 employers on site. Bring copies of your resume and your Northenbridge ID.",
    ],
    [
        "title" => "Homecoming Weekend",
        "date"  => "Oct 17–18, 2026",
        "time"  => "All weekend",
        "loc"   => "Whitfield Field",
        "cat"   => "Traditions",
        "desc"  => "Reunion brunch, the alumni match, and the evening bonfire on the west lawn.",
    ],
    [
        "title" => "Student Research Symposium",
        "date"  => "Nov 7, 2026",
        "time"  => "9:00 AM – 3:00 PM",
        "loc"   => "Innovation Building",
        "cat"   => "Academic",
        "desc"  => "Senior capstones and undergraduate research presented across the five schools.",
    ],
    [
        "title" => "Winter Concert",
        "date"  => "Dec 12, 2026",
        "time"  => "7:30 PM",
        "loc"   => "Whitfield Auditorium",
        "cat"   => "Arts",
        "desc"  => "The Chamber Choir and Ensemble perform a seasonal program. Free with student ID.",
    ],
    [
        "title" => "Undergraduate Networking Night",
        "date"  => "Jan 23, 2027",
        "time"  => "5:30 PM – 8:00 PM",
        "loc"   => "The Commons",
        "cat"   => "Careers",
        "desc"  => "Alumni mentors meet informally with first- and second-year students across all majors.",
    ],
    [
        "title" => "Spring Convocation",
        "date"  => "May 8, 2027",
        "time"  => "10:00 AM",
        "loc"   => "Whitfield Field",
        "cat"   => "Traditions",
        "desc"  => "Commencement ceremony for the graduating class of " . date('Y') . ".",
    ],
];

$year = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Events — Northenbridge College</title>
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

    /* ---------- Events list ---------- */
    .events-wrap {
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

    .event-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    .event-row {
        border: 1px solid var(--line);
        background: #fffdf8;
        padding: 1.3rem 1.4rem;
        border-radius: 3px;
        border-top: 3px solid var(--hedge);
    }

    .event-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem 1.2rem;
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.8rem;
        color: var(--brass);
        font-weight: 600;
        letter-spacing: 0.02em;
        margin-bottom: 0.45rem;
    }

    .event-meta span { display: inline-flex; align-items: center; gap: 0.3rem; }

    .event-cat {
        background: #f0ece2;
        color: var(--hedge);
        padding: 0.15rem 0.6rem;
        border-radius: 11px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .event-row h3 {
        font-size: 1.12rem;
        margin: 0.15rem 0 0.5rem;
        color: var(--hedge-dark);
    }

    .event-row p {
        font-family: "Segoe UI", Helvetica, Arial, sans-serif;
        font-size: 0.88rem;
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
    @media (max-width: 760px) {
        .event-list { grid-template-columns: 1fr; }
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
        <div class="hero-motto sans">CAMPUS EVENTS</div>
        <h1>Upcoming on Campus</h1>
        <p class="lede">Lectures, fairs, performances, and long-standing traditions. All upcoming events are free for students with a Northenbridge ID.</p>
    </div>
</section>

<div class="events-wrap">
    <div class="section-head">
        <h2>Full Calendar — <?php echo $year; ?> Season</h2>
        <a href="index.php">Back to announcements</a>
    </div>

    <div class="event-list">
        <?php foreach ($events as $e): ?>
        <div class="event-row">
            <div class="event-meta">
                <span><?php echo htmlspecialchars($e['date']); ?></span>
                <span><?php echo htmlspecialchars($e['time']); ?></span>
                <span><?php echo htmlspecialchars($e['loc']); ?></span>
                <span class="event-cat"><?php echo htmlspecialchars($e['cat']); ?></span>
            </div>
            <h3><?php echo htmlspecialchars($e['title']); ?></h3>
            <p><?php echo htmlspecialchars($e['desc']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <div class="footer-inner">
        <span>&copy; <?php echo $year; ?> Northenbridge College</span>
        <span>18 Whitfield Lane · Northenbridge</span>
    </div>
</footer>

</body>
</html>