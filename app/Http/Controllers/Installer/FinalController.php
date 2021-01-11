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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\DatabaseManager; use App\Http\Controllers\Installer\Helpers\EnvironmentManager; use App\Http\Controllers\Installer\Helpers\FinalInstallManager; use App\Http\Controllers\Installer\Helpers\InstalledFileManager; class FinalController extends Controller { public function final(FinalInstallManager $finalInstall, EnvironmentManager $environment) { $finalMessages = $finalInstall->runFinal(); $finalEnvFile = $environment->getEnvContent(); return view("\151\156\x73\164\x61\x6c\154\x65\162\x2e\146\151\x6e\x69\163\150\x65\x64", compact("\146\x69\156\x61\154\115\x65\x73\163\x61\147\145\x73", "\x66\151\156\141\154\x45\156\166\106\151\x6c\145")); } public function seedDemo(DatabaseManager $databaseManager) { $response = $databaseManager->seedDemoData(); return redirect()->route("\111\x6e\x73\x74\141\x6c\x6c\x65\x72\56\x66\151\x6e\151\x73\150"); } public function finish(InstalledFileManager $fileManager) { $finalStatusMessage = $fileManager->update(); return redirect()->to(config("\x69\x6e\x73\164\141\x6c\154\x65\162\56\162\145\144\151\x72\145\x63\164\x55\x72\x6c"))->with("\x6d\145\163\163\x61\x67\x65", $finalStatusMessage); } }
