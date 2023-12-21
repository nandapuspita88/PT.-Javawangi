<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    public function index(){
        return view('page/repository',[
    	"title" => "Repository",
        "repo" => Repo::all()
        ]);
    }
    
    public function show(Repo $repo)
    {
        return view('repository',[
            "title" => "Repository",
            "repo" => $repo
        ]);
    }
}
