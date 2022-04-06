<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function index() {
        return view('content.registration');
    }

    public function store(Request $request) {

        Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string',
            'junior_high_school' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'major' => 'required|string',
        ])->validate();

        $registration = new Registration;

        $registration->name = $request->name;
        $registration->address = $request->address;
        $registration->junior_high_school = $request->junior_high_school;
        $registration->gender = $request->gender;
        $registration->religion = $request->religion;
        $registration->major = $request->major;

        $lastOrder = Registration::orderBy('registration_number', 'desc')->first();

        if($lastOrder === null) {
            $registration->registration_number = 1;
        } else {
            $registration->registration_number = $lastOrder->registration_number + 1;
        }

        $registration->save();

        return redirect()->back()
        ->with('success', 'Selamat! Registrasi berhasil.')
        ->with('id', $registration->id);
    }

    public function print($id) {
        $registration = Registration::findOrFail($id);

        $createdDate = Carbon::createFromDate($registration->created_at)->locale('id_ID')->tz('Asia/Jakarta');

        $createdAt = $createdDate->hour.':'. $createdDate->minute .' '.$createdDate->day.' '.$createdDate->monthName.' '.$createdDate->year;

        $registration->registered_at = $createdAt;

        $pdf = FacadePdf::loadView('export.registration', $registration->toArray());

        return $pdf->download('registrasi.pdf');
    }

    public function report(Request $request) {
        $reports = Registration::orderBy('registration_number', 'desc');

        if(isset($request->name)) {
            $reports->where('name', 'LIKE', '%'.$request->name.'%');
        }

        $reports = collect($reports->paginate(10));

        $reports['data'] = collect($reports['data'])->map(function ($item, $key) {
            $createdDate = Carbon::createFromDate($item['created_at'])->locale('id_ID')->tz('Asia/Jakarta');

            $item['created_at'] = $createdDate->day.' '.$createdDate->monthName.' '.$createdDate->year;

            return $item;
        });

        return view('content.data')
            ->with('reports', $reports);
    }

    public function detail(Request $request) {
        $registration = Registration::findOrFail($request->id);

        return response()->json($registration);
    }

    public function update(Request $request) {

        Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string',
            'junior_high_school' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'major' => 'required|string',
        ])->validate();

        $registration = Registration::findOrFail($request->id);

        $registration->name = $request->name;
        $registration->address = $request->address;
        $registration->junior_high_school = $request->junior_high_school;
        $registration->gender = $request->gender;
        $registration->religion = $request->religion;
        $registration->major = $request->major;

        $registration->save();

        return redirect()->back()->with('success-update', 'Data berhasil diubah!');
    }

    public function delete(Request $request) {
        Registration::findOrFail($request->id)->delete();

        return response()->json('ok');
    }
}
