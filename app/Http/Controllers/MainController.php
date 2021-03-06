<?php

namespace App\Http\Controllers;

use COM;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function hardware()
    {

        $obj = new COM ( 'winmgmts://localhost/root/CIMV2' );
        $fso = new COM ( "Scripting.FileSystemObject" );
        $wmi_computersystem    =    $obj->ExecQuery("Select * from Win32_ComputerSystem");
        $wmi_bios              =    $obj->ExecQuery("Select * from Win32_BIOS");
        $processor             =    $obj->ExecQuery("Select * from Win32_Processor");
        $PhysicalMemory        =    $obj->ExecQuery("Select * from Win32_PhysicalMemory");
        $BaseBoard             =    $obj->ExecQuery("Select * from Win32_BaseBoard");
        $LogicalDisk           =    $obj->ExecQuery("Select * from Win32_LogicalDisk");


        foreach ( $wmi_computersystem as $wmi_call )
        {
            $model = $wmi_call->Model;
        }

        foreach ( $wmi_bios as $wmi_call )
        {
            $serial = $wmi_call->SerialNumber;
            $bios_version = $wmi_call->SMBIOSBIOSVersion;
        }

        foreach ( $processor as $wmi_processor )
        {
            $idprocessor = $wmi_processor->ProcessorId;
            $Architecture = $wmi_processor->Architecture;
            $Name = $wmi_processor->Name;
            $Version = $wmi_processor->Version;
        }
        foreach ( $PhysicalMemory as $wmi_PhysicalMemory )
        {
            $Capacity = $wmi_PhysicalMemory->Capacity;
            $PartNumber = $wmi_PhysicalMemory->PartNumber;
            $Name = $wmi_PhysicalMemory->Name;
        }

        foreach ( $BaseBoard as $wmi_BaseBoard )
        {
            $SerialNumber = $wmi_BaseBoard->SerialNumber;

        }
        foreach ( $LogicalDisk as $wmi_LogicalDisk )
        {
            $SerialNumberDisk = $wmi_LogicalDisk->VolumeSerialNumber;
            $FileSystem = $wmi_LogicalDisk->FileSystem;

        }


        echo "Bios version   : " . $bios_version . "<br/>
          Serial number of bios  : " . $serial . "<br/>
          Hardware Model : " . $model . "<br/>
          ID-Processor : " . $idprocessor . "<br/>
          Architecture-Processor : " . $Architecture . "<br/>
          Name-Processor : " . $Name . "<br/>
          Version-Processor : " . $Version . "<br/>
          <hr>
          <hr>
          PhysicalMemory
          <hr>
          <hr>
          Capacity : " . $Capacity . "<br/>
          Name : " . $Name . "<br/>
          <hr>
          <hr>
          carte mere
          <hr>
          <hr>
          SerialNumber : " . $SerialNumber . "<br/>
           <hr>
          <hr>
          disk
          <hr>
          <hr>
          SerialNumber : " . $SerialNumberDisk . "<br/>
          FileSystem : " . $FileSystem . "<br>
          ";
    }
}
