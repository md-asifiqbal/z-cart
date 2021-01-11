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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use Illuminate\Http\Request; use Illuminate\Routing\Redirector; use App\Http\Controllers\Installer\Helpers\EnvironmentManager; use Validator; class EnvironmentController extends Controller { protected $EnvironmentManager; public function __construct(EnvironmentManager $environmentManager) { $this->EnvironmentManager = $environmentManager; } public function environmentMenu() { return view("\x69\156\163\164\x61\x6c\154\145\162\x2e\x65\x6e\166\151\x72\x6f\156\x6d\145\x6e\164"); } public function environmentWizard() { } public function environmentClassic() { $envConfig = $this->EnvironmentManager->getEnvContent(); return view("\151\156\x73\164\x61\154\154\x65\x72\x2e\145\x6e\x76\151\162\157\156\x6d\x65\156\x74\55\143\154\141\x73\x73\151\143", compact("\145\156\x76\x43\157\156\146\x69\x67")); } public function saveClassic(Request $input, Redirector $redirect) { $message = $this->EnvironmentManager->saveFileClassic($input); return $redirect->route("\111\x6e\163\x74\x61\154\154\145\x72\x2e\145\x6e\166\151\x72\157\156\155\x65\x6e\x74\x43\154\141\x73\x73\151\143")->with(["\155\145\x73\163\x61\147\x65" => $message]); } }
