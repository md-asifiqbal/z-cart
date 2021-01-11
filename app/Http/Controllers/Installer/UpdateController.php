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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\InstalledFileManager; use App\Http\Controllers\Installer\Helpers\DatabaseManager; class UpdateController extends Controller { use \App\Http\Controllers\Installer\Helpers\MigrationsHelper; public function welcome() { return view("\151\156\x73\x74\141\x6c\x6c\x65\x72\56\165\x70\144\x61\164\x65\x2e\167\145\x6c\x63\x6f\x6d\145"); } public function overview() { $migrations = $this->getMigrations(); $dbMigrations = $this->getExecutedMigrations(); return view("\151\156\163\x74\x61\154\154\145\x72\56\165\x70\x64\x61\164\145\x2e\157\x76\145\x72\166\151\145\167", ["\x6e\165\155\x62\145\162\x4f\x66\125\x70\144\141\164\x65\163\x50\x65\156\x64\x69\x6e\x67" => count($migrations) - count($dbMigrations)]); } public function database() { $databaseManager = new DatabaseManager(); $response = $databaseManager->migrateAndSeed(); return redirect()->route("\114\141\162\x61\x76\145\154\125\x70\144\x61\164\x65\162\72\72\x66\151\156\141\x6c")->with(["\x6d\x65\x73\x73\x61\x67\x65" => $response]); } public function finish(InstalledFileManager $fileManager) { $fileManager->update(); return view("\151\156\163\164\x61\154\x6c\145\x72\56\165\x70\x64\141\164\x65\56\x66\151\x6e\x69\x73\150\x65\144"); } }
