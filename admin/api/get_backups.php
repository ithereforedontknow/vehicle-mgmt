<?php
$backupFolder = 'backups/';
$backups = glob($backupFolder . '*.sql');
$backupList = array_map('basename', $backups);
echo json_encode($backupList);
