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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Support\Facades\Artisan; use Symfony\Component\Console\Output\BufferedOutput; class FinalInstallManager { public function runFinal() { $outputLog = new BufferedOutput(); $this->generateKey($outputLog); $this->publishVendorAssets($outputLog); return $outputLog->fetch(); } private static function generateKey($outputLog) { try { if (!config("\151\x6e\163\164\x61\154\x6c\x65\x72\56\146\151\x6e\141\154\56\x6b\145\x79")) { goto ivgk_; } Artisan::call("\x6b\x65\171\72\x67\x65\x6e\x65\162\x61\x74\145", ["\55\55\146\x6f\x72\143\x65" => true], $outputLog); ivgk_: } catch (Exception $e) { return static::response($e->getMessage(), $outputLog); } return $outputLog; } private static function publishVendorAssets($outputLog) { try { if (!config("\x69\156\163\x74\x61\x6c\154\145\162\x2e\146\151\x6e\141\154\x2e\x70\165\x62\x6c\x69\163\150")) { goto yCWB2; } Artisan::call("\166\145\156\x64\x6f\162\72\160\165\x62\154\151\163\x68", ["\x2d\x2d\141\x6c\154" => true], $outputLog); yCWB2: } catch (Exception $e) { return static::response($e->getMessage(), $outputLog); } return $outputLog; } private static function response($message, $outputLog) { return ["\163\x74\141\x74\x75\x73" => "\x65\x72\x72\x6f\x72", "\x6d\x65\x73\x73\141\147\x65" => $message, "\x64\x62\117\165\x74\x70\165\x74\x4c\x6f\147" => $outputLog->fetch()]; } }
