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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Database\SQLiteConnection; use Illuminate\Support\Facades\Artisan; use Illuminate\Support\Facades\Config; use Illuminate\Support\Facades\DB; use Symfony\Component\Console\Output\BufferedOutput; class DatabaseManager { public function migrateAndSeed() { $outputLog = new BufferedOutput(); $this->sqlite($outputLog); return $this->migrate($outputLog); } private function migrate($outputLog) { try { Artisan::call("\155\151\x67\162\x61\164\x65", ["\x2d\x2d\146\x6f\162\143\x65" => true], $outputLog); } catch (Exception $e) { return $this->response($e->getMessage(), "\145\162\162\157\162", $outputLog); } return $this->seed($outputLog); } private function seed($outputLog) { try { Artisan::call("\x64\142\x3a\163\145\145\144", ["\x2d\55\x66\x6f\162\x63\x65" => true], $outputLog); } catch (Exception $e) { return $this->response($e->getMessage(), "\x65\162\162\157\162", $outputLog); } return $this->response(trans("\x69\x6e\163\x74\141\x6c\154\145\x72\137\x6d\145\x73\x73\x61\x67\x65\x73\56\x66\x69\x6e\141\154\56\146\x69\x6e\151\x73\150\x65\144"), "\163\x75\143\143\x65\163\x73", $outputLog); } public function seedDemoData() { ini_set("\x6d\141\170\x5f\145\x78\x65\143\165\164\151\x6f\156\x5f\164\x69\155\145", 1200); $outputLog = new BufferedOutput(); try { Artisan::call("\151\x6e\143\145\166\151\157\72\144\145\155\157"); } catch (Exception $e) { return $this->response($e->getMessage(), "\x65\162\x72\157\162", $outputLog); } return $this->response(trans("\151\156\x73\164\x61\154\154\x65\x72\x5f\x6d\145\163\x73\x61\147\x65\163\56\146\151\x6e\x61\154\56\146\x69\156\x69\x73\150\145\144"), "\163\165\x63\x63\x65\163\x73", $outputLog); } private function response($message, $status = "\x64\x61\156\x67\145\x72", $outputLog) { return ["\x73\164\x61\164\165\163" => $status, "\155\145\163\163\x61\x67\145" => $message, "\144\x62\x4f\x75\164\160\x75\x74\114\x6f\147" => $outputLog->fetch()]; } private function sqlite($outputLog) { if (!DB::connection() instanceof SQLiteConnection) { goto yot_k; } $database = DB::connection()->getDatabaseName(); if (file_exists($database)) { goto Bbm_L; } touch($database); DB::reconnect(Config::get("\144\x61\164\141\x62\x61\163\x65\56\x64\145\146\x61\165\x6c\164")); Bbm_L: $outputLog->write("\125\x73\151\156\147\40\x53\161\x6c\x4c\151\x74\x65\x20\144\x61\x74\141\142\x61\163\145\72\40" . $database, 1); yot_k: } }