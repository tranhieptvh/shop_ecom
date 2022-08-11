<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInfoRequest;
use App\Repositories\InfoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function update(UpdateInfoRequest $request) {
        $info_data = $request->input();

        DB::beginTransaction();
        try {
            $info = $this->infoRepository->getInfoShop();
            if ($request->hasFile('zalo_qr')) {
                $file_zalo = $request->zalo_qr;
                $info_data['zalo_qr'] = handleImage($file_zalo, 'info');
            }
            if ($request->hasFile('bank_qr')) {
                $file_bank = $request->bank_qr;
                $info_data['bank_qr'] = handleImage($file_bank, 'info');
            }

            // delete img QR code
            if ($info_data['delete_zalo_qr'] == 1) {
                $info_data['zalo_qr'] = '';
            }
            if ($info_data['delete_bank_qr'] == 1) {
                $info_data['bank_qr'] = '';
            }

            $result = $this->infoRepository->update($info, $info_data);

            DB::commit();

            return back()->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }
}
