<?php
/*   __________________________________________________
    |  Obfuscated by YAK Pro - Php Obfuscator  2.0.1   |
    |              on 2020-11-30 10:11:22              |
    |    GitHub: https://github.com/pk-fr/yakpro-po    |
    |__________________________________________________|
*/
/*
* Copyright (C) Incevio Systems, Inc - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Munna Khan <help.zcart@gmail.com>, September 2018
*/
 namespace App\Http\Controllers\Installer\Helpers; class InstalledFileManager { public function create() { $installedLogFile = storage_path("\x69\x6e\163\x74\x61\x6c\154\x65\144"); $dateStamp = date("\x59\x2f\155\57\x64\x20\x68\x3a\151\72\163\x61"); if (!file_exists($installedLogFile)) { goto JnWmA; } $message = trans("\x69\x6e\x73\x74\x61\154\x6c\x65\162\x5f\155\145\163\x73\x61\147\x65\x73\56\x75\x70\x64\x61\164\x65\162\x2e\154\157\x67\56\163\x75\143\143\x65\x73\163\137\x6d\145\163\163\x61\147\145") . $dateStamp; file_put_contents($installedLogFile, $message . PHP_EOL, FILE_APPEND | LOCK_EX); goto nKt33; JnWmA: $message = trans("\151\x6e\163\164\141\x6c\154\x65\x72\137\155\145\163\x73\x61\147\145\x73\x2e\151\156\x73\x74\x61\x6c\154\x65\x64\56\163\x75\x63\143\145\163\163\x5f\x6c\x6f\x67\137\155\145\163\x73\141\147\145") . $dateStamp . "\12"; file_put_contents($installedLogFile, $message); nKt33: return $message; } public function update() { return $this->create(); } }
