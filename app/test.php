<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 7/11/2018
 * Time: 3:29 PM
 */

namespace App;


use COM;

class test
{

    public function test()
    {
        $obj = new COM('winmgmts://localhost/root/CIMV2');
        $fso = new COM ( "Scripting.FileSystemObject" );
        $wmi_computersystem = $obj->ExcuteQuery("select * from Win32_ComputerSystem");
    }

}