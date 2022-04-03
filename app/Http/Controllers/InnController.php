<?php

namespace App\Http\Controllers;

use App\Http\Requests\InnPostRequest;
use App\Repositories\InnRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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

        return view('main', [
            'inn' => $innDTO->getinn(),
            'status' => $innDTO->getMessage(),
            'message' => $innDTO->getMessage(),
            'code' => $innDTO->getCode(),
        ]);
    }
}
