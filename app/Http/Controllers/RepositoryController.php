<?php

namespace App\Http\Controllers;

use App\PackageInfo;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class RepositoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('composer.access.control');
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
    
    public function getPackagesList(PackageInfo $packageInfo)
    {
        return response($packageInfo->content)->header('Content-Type', 'application/json');
    }
    
    public function getPackageFile($packageFile)
    {
        $filePath = "repository/dist/{$packageFile}";
        if(!Storage::exists($filePath)){
            return abort(Response::HTTP_NOT_FOUND);
        }
        
        return Storage::download($filePath);
    }
}
