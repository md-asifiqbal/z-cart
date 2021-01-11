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
 namespace App\Http\Controllers\Installer; use App\Http\Requests; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\PermissionsChecker; class PermissionsController extends Controller { protected $permissions; public function __construct(PermissionsChecker $checker) { $this->permissions = $checker; } public function permissions() { $permissions = $this->permissions->check(config("\151\156\x73\164\141\x6c\154\145\x72\56\x70\x65\x72\x6d\x69\x73\163\151\x6f\x6e\163")); return view("\151\x6e\163\164\141\154\154\x65\x72\56\x70\145\162\x6d\151\x73\163\151\x6f\x6e\x73", compact("\160\145\x72\x6d\x69\163\163\x69\x6f\x6e\163")); } }
