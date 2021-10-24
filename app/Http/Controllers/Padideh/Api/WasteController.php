<?php

namespace App\Http\Controllers\Padideh\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\Padideh\WasteResource;
use App\Repositories\Admin\PasmandRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WasteController extends Controller
{
    private $wasteRepository;

    public function __construct(PasmandRepo $pasmandRepo)
    {
        $this->wasteRepository = $pasmandRepo;
    }
    public function wasteList(Request $request)
    {
        $wastes = WasteResource::collection($this->wasteRepository->getWastes($request));

        return $this->successResponse('لیست پسماندها', $wastes);
    }
}
