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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Http\Request; class EnvironmentManager { private $envPath; private $envExamplePath; public function __construct() { $this->envPath = base_path("\x2e\145\x6e\x76"); $this->envExamplePath = base_path("\x2e\x65\156\166\x2e\145\170\141\155\x70\154\145"); } public function getEnvContent() { if (file_exists($this->envPath)) { goto pAi1R; } if (file_exists($this->envExamplePath)) { goto oti3i; } touch($this->envPath); goto GOf6s; oti3i: copy($this->envExamplePath, $this->envPath); GOf6s: pAi1R: return file_get_contents($this->envPath); } public function getEnvPath() { return $this->envPath; } public function getEnvExamplePath() { return $this->envExamplePath; } public function saveFileClassic(Request $input) { $message = trans("\151\x6e\x73\164\141\154\154\145\162\x5f\x6d\x65\163\163\141\x67\x65\x73\56\145\x6e\166\151\x72\157\x6e\155\x65\156\164\x2e\x73\x75\143\143\145\x73\163"); try { file_put_contents($this->envPath, $input->get("\x65\156\166\103\x6f\156\146\151\147")); } catch (Exception $e) { $message = trans("\151\156\163\x74\x61\154\154\145\x72\137\155\x65\x73\x73\141\147\x65\x73\x2e\145\x6e\166\151\x72\157\x6e\155\145\x6e\x74\x2e\x65\162\x72\157\x72\163"); } return $message; } }
