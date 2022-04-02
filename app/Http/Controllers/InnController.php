<?php

namespace App\Http\Controllers;

use App\DTO\Inn\InnDTO;
use App\Http\Requests\InnPostRequest;
use App\Repositories\InnRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class InnController extends Controller
{
    protected InnRepository $innRepository;

    /**
     * @param InnRepository $innRepository
     */
    public function __construct(InnRepository $innRepository)
    {
        $this->innRepository = $innRepository;
    }


    public function showInfo(InnPostRequest $request): Factory|View|Application
    {
        $validated = $request->validated();
        $inn = $validated['inn'];
        $innDTO = $this->innRepository->getInnInfo($inn);

        Log::debug($innDTO);

        $status = $innDTO->getStatus();
        if ($status == true) {
            $status = $innDTO->getinn() . ' является плательщиком налога на профессиональный доход';
        } else {
            $status = $innDTO->getinn() . ' не является плательщиком налога на профессиональный доход';
        }

        return view('welcome', ['status' => $innDTO->getMessage()]);
    }
}
