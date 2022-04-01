<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnnPostRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EnnController extends Controller
{
    public function showInfo(EnnPostRequest $request): Factory|View|Application
    {
        $validated = $request->validated();
        $enn = $validated['enn'];
        return view('welcome', ['enn' => $enn]);
    }
}
