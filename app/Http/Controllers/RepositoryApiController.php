<?php

namespace App\Http\Controllers;

use App\PackageInfo;
use Illuminate\Http\Request;

class RepositoryApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('api.access.control');
    }
    
    public function getConfigFile()
    {
        $configFile = json_decode(file_get_contents(base_path('satis.json')), true);
        $configFile['repositories'] = [
            ['type' => 'vcs', 'url' => 'http://optgit.optimeconsulting.net:8090/internal/optime_sdk_bills_central.git'],
            ['type' => 'vcs', 'url' => 'http://optgit.optimeconsulting.net:8090/component/optime_sso_dna_library.git']
        ];
        
        return $configFile;
    }
    
    public function updatePackageInformation(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        
        $packageData = $data['repo'];
        $packageInfo = PackageInfo::where('hash', $packageData['hash'])->first();
        if(!$packageInfo) {
            $packageInfo = new PackageInfo();
            $packageInfo->content = $packageData['content'];
            $packageInfo->hash = $packageData['hash'];
            $packageInfo->algo = $packageData['algo'];
            $packageInfo->save();
        }
        
        return 'Packages update';
    }
}
