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
 namespace App\Http\Controllers\Installer; use Illuminate\Routing\Controller; use App\Http\Controllers\Installer\Helpers\RequirementsChecker; class RequirementsController extends Controller { protected $requirements; public function __construct(RequirementsChecker $checker) { $this->requirements = $checker; } public function requirements() { $phpSupportInfo = $this->requirements->checkPHPversion(config("\151\x6e\163\x74\141\154\x6c\x65\x72\x2e\x63\157\x72\145\56\155\x69\156\x50\x68\160\x56\145\162\163\x69\x6f\156"), config("\151\x6e\163\164\x61\154\x6c\x65\x72\56\x63\x6f\162\145\56\x6d\141\x78\120\x68\x70\126\x65\162\163\x69\x6f\156")); $requirements = $this->requirements->check(config("\151\156\163\164\x61\x6c\x6c\x65\x72\56\x72\x65\161\x75\151\x72\145\x6d\145\156\164\163")); return view("\151\x6e\x73\164\x61\154\x6c\x65\x72\56\x72\x65\161\x75\x69\162\145\x6d\x65\x6e\164\163", compact("\x72\x65\161\165\x69\162\145\x6d\145\156\164\x73", "\160\150\160\123\165\160\160\157\x72\164\x49\x6e\146\157")); } }
