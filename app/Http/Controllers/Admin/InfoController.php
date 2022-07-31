<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\InfoRepository;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    protected $infoRepository;

    public function __construct(
        InfoRepository $infoRepository
    ) {
        $this->infoRepository = $infoRepository;
    }

    public function index() {
        $info = $this->infoRepository->getInfoShop();

        return view('admin.info.index')->with([
            'info' => $info,
        ]);
    }
}
