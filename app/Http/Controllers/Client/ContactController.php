<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\InfoRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $infoRepository;

    public function __construct(
        InfoRepository $infoRepository
    ) {
        $this->infoRepository = $infoRepository;
    }

    public function index() {
        $info = $this->infoRepository->getInfoShop();

        return view('client.contact.index')->with([
           'info' => $info,
        ]);
    }

    public function deposit() {
        $info = $this->infoRepository->getInfoShop();

        return view('client.contact.deposit')->with([
            'info' => $info,
        ]);
    }
}
