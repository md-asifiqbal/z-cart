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
 namespace App\Http\Controllers\Installer; use Exception; use Illuminate\Support\Facades\DB; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\DatabaseManager; class DatabaseController extends Controller { private $databaseManager; public function __construct(DatabaseManager $databaseManager) { $this->databaseManager = $databaseManager; } public function database() { if ($this->checkDatabaseConnection()) { goto Rfaqy; } return redirect()->back()->withErrors(["\144\x61\x74\141\x62\x61\163\145\137\143\x6f\156\156\145\143\x74\151\x6f\x6e" => trans("\151\156\163\x74\141\x6c\154\x65\x72\x5f\155\x65\163\x73\141\147\x65\x73\x2e\145\156\x76\151\x72\157\x6e\155\145\x6e\x74\x2e\167\151\x7a\141\x72\x64\56\146\x6f\162\155\x2e\x64\142\x5f\x63\157\x6e\x6e\145\143\x74\x69\157\x6e\137\146\x61\x69\154\x65\x64")]); Rfaqy: ini_set("\155\141\170\x5f\x65\170\145\x63\165\164\x69\x6f\156\x5f\164\x69\x6d\x65", 600); $response = $this->databaseManager->migrateAndSeed(); return redirect()->route("\111\156\x73\x74\x61\154\154\x65\162\x2e\x66\151\156\x61\154")->with(["\155\145\x73\x73\141\147\145" => $response]); } private function checkDatabaseConnection() { try { DB::connection()->getPdo(); return true; } catch (Exception $e) { return false; } } }
