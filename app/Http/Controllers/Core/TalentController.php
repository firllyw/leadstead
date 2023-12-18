<?php 

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

class TalentController extends Controller
{
    
    public function index()
    {
        return view('pages.app.talent.list', [
            'title' => 'Talent',
            'description' => 'Talent',
            'active' => 'talent'
        ]);
    }

    public function show($email)
    {
        return view('core.talents.show', compact('talent'));
    }
}