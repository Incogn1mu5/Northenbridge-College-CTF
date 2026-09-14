<?php

$dbPath = __DIR__ . '/database/college.db';

try {
    $db = new SQLite3($dbPath);
    $db->busyTimeout(5000);
    $db->exec('PRAGMA foreign_keys = ON;');
} catch (Exception $e) {
    die('Database connection failed: ' . $e->getMessage());
}