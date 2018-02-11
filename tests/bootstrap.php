<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/11/18
 */

passthru("php artisan migrate:fresh");

require __DIR__ . '/../vendor/autoload.php';
