<?php

namespace App\Http\Controllers;

use App\PackageInfo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RepositoryController extends Controller
{
    public function getConfigFile(Request $request)
    {
        if ($request->get('api-key') !== 'prueba') {
            return abort(Response::HTTP_UNAUTHORIZED);
        }
    
        $configFile = json_decode(file_get_contents(base_path('satis.json')), true);
        $configFile['repositories'] = [
            ['type' => 'vcs', 'url' => 'http://optgit.optimeconsulting.net:8090/internal/optime_sdk_bills_central.git']
        ];
        
        return $configFile;
    }
    
    public function getPackageConfig()
    {
        $packageInfo = PackageInfo::orderBy('created_at', 'desc')->first();
        
        if (!$packageInfo) {
            return abort(Response::HTTP_NOT_FOUND);
        }
        
        $repositoryInitInformation = [
            'packages' => [],
            'includes' => [
                "include/{$packageInfo->hash}.json" => [
                    $packageInfo->algo => $packageInfo->hash
                ]
            ]
        ];
        
        return $repositoryInitInformation;
    }
    
    public function getPackages(PackageInfo $packageInfo)
    {
        return response($packageInfo->content)->header('Content-Type', 'application/json');
    }
    
    public function updatePackageInformation(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $apiKey = $data['api-key'];
        
        if ($apiKey !== 'prueba') {
           return abort(Response::HTTP_UNAUTHORIZED);
        }
        
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
