<?php

namespace App\Http\Controllers;

use App\Http\Requests\InnPostRequest;
use App\Services\InnServices\InnApiServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class InnController extends Controller
{
    protected InnApiServices $innApiServices;

    public function __construct(InnApiServices $innApiServices)
    {
        $this->innApiServices = $innApiServices;
    }

    public function showInfo(InnPostRequest $request): Factory|View|Application
    {
        $validated = $request->validated();
        $inn = $validated['inn'];
        $result = $this->innApiServices->requestApi($inn);

        $status = false;
        $message = '';
        if ($result['status'] != null) {
            $status = $result['status'];
        }
        if ($result['message'] != null) {
            $message = $result['message'];
        }

        return view('welcome', ['status' => $status, 'message' => $message]);
    }
}
