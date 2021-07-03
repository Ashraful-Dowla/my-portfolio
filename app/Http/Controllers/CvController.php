<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Toastr;
use Validator;

class CvController extends Controller
{
    public function create()
    {
        return view('admin.cv.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cv' => 'required|mimes:pdf|max:1024',
        ]);

        if ($validator->fails()) {
            $this->errors($validator->errors());
            return redirect()->back();
        }

        $data = Cv::where('user_id', auth()->user()->id)->first();
        $cv = new Cv();
        if ($data) {
            $this->delete($data->cv);
            $data->cv = $this->upload($request->cv);

            if (!$data->save()) {
                Toastr::error('Failed CV Uploaded', 'Message', ["positionClass" => "toast-top-right"]);
            } else {
                Toastr::success('Successfully CV Uploaded', 'Message', ["positionClass" => "toast-top-right"]);
            }

        } else {
            $cv->cv = $this->upload($request->cv);
            $cv->user_id = auth()->user()->id;

            if (!$cv->save()) {
                Toastr::error('Failed CV Uploaded', 'Message', ["positionClass" => "toast-top-right"]);
            } else {
                Toastr::success('Successfully CV Uploaded', 'Message', ["positionClass" => "toast-top-right"]);
            }
        }
        return redirect(route('cv.create'));
    }

    private function errors($errors)
    {
        foreach ($errors->all() as $message) {
            Toastr::error($message, 'Message', ["positionClass" => "toast-top-right"]);
        }
    }

    private function upload($file)
    {
        $filename = $file->getClientOriginalName();
        $name = explode(".", $file)[0];
        $extension = $file->getClientOriginalExtension();
        $newFileName = 'my_cv.' . $extension;

        $file->storeAs('cv', $filename, 'public');
        Storage::move('/public/cv/' . $filename, '/public/cv/' . $newFileName);
        return $newFileName;
    }

    private function delete($filename)
    {
        Storage::delete('/public/cv/' . $filename);
    }
}
