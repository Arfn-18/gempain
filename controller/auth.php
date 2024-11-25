<?php
session_start();

// Helper function untuk memeriksa role
function isAdmin()
{
    return isset($_SESSION['level_user']) && $_SESSION['level_user'] === '1';
}

function isLoggedIn()
{
    return isset($_SESSION['username']);
}
