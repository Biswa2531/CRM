<?php
/**
 * Mail configuration for PHPMailer
 * Copy this file to set real SMTP credentials.
 */
return [
    // Set to true to use SMTP (PHPMailer). If false, fallback to PHP mail().
    // Use MailHog for local development: runs on localhost:1025 by default.
    'use_smtp'    => true,
    'host'        => 'localhost',
    'port'        => 1025,
    'username'    => '',
    'password'    => '',
    'encryption'  => '', // no encryption for MailHog
    'from_email'  => 'no-reply@localhost',
    'from_name'   => 'ResolveHub',
    // Optional: enable SMTP debug during development (0 = off, 2 = verbose)
    'smtp_debug'  => 0,
];
