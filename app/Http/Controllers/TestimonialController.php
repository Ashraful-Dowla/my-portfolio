<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Toastr;
use Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index')->with(['testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'designation' => 'required|min:3|max:255',
            'quote' => 'required|min:10|max:255',
        ];

        if ($request->hasFile('avatar')) {
            $rules['avatar'] = 'required|image|mimes:jpg,jpeg,png|max:1024'; //kb
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $this->errors($validator->errors());
            return redirect()->back();
        }

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->quote = $request->quote;
        $testimonial->user_id = auth()->user()->id;

        if ($request->hasFile('avatar')) {
            $testimonial->avatar = $this->upload($request->avatar);
        }

        if ($testimonial->save()) {
            Toastr::success('Successfully Inserted', 'Message', ["positionClass" => "toast-top-right"]);
        } else {
            Toastr::error('Failed', 'Message', ["positionClass" => "toast-top-right"]);
        }
        return redirect(route('testimonials.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show')->with(['testimonial' => $testimonial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit')->with(['testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'designation' => 'required|min:3|max:255',
            'quote' => 'required|min:10|max:255',
        ];

        if ($request->hasFile('avatar')) {
            $rules['avatar'] = 'required|image|mimes:jpg,jpeg,png|max:1024'; //kb
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $this->errors($validator->errors());
            return redirect()->back();
        }

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'quote' => $request->quote,
        ];

        if ($request->hasFile('avatar')) {
            if($testimonial->avatar) {
                $this->delete($testimonial->avatar);
            }
            $data['avatar'] = $this->upload($request->avatar);
        }

        $testimonial->update($data);
        Toastr::success('Successfully Updated', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect(route('testimonials.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if($testimonial->avatar) {
            $this->delete($testimonial->avatar);
        }
        $testimonial->delete();
        Toastr::success('Successfully Deleted', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect(route('testimonials.index'));
    }

    private function errors($errors)
    {
        foreach ($errors->all() as $message) {
            Toastr::error($message, 'Message', ["positionClass" => "toast-top-right"]);
        }
    }

    private function upload($image)
    {
        $now = new DateTime();
        $filename = $image->getClientOriginalName();
        $name = explode(".", $filename)[0];
        $extension = $image->getClientOriginalExtension();
        $newFileName = $name . '_' . $now->format('Y-m-d_H-i-s') . '.' . $extension;
        $image->storeAs('images', $filename, 'public');
        Storage::move('/public/images/' . $filename, '/public/images/' . $newFileName);
        return $newFileName;
    }

    private function delete($avatar)
    {
        Storage::delete('/public/images/' . $avatar);
    }
}
