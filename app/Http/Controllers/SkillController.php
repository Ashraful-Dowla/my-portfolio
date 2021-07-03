<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;
use Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index')->with(['skills' => $skills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Toastr::clear();
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug_name'] = Str::slug($request->name, '-');

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:255',
            'slug_name' => 'unique:skills',
            'progress_value' => 'required|numeric|min:1|max:100',
        ], ['slug_name.unique' => 'The name has already taken']);

        if ($validator->fails()) {
            $this->errors($validator->errors());
        } else {
            auth()->user()->skills()->create($request->all());
            Toastr::success('Successfully Inserted', 'Message', ["positionClass" => "toast-top-right"]);
        }

        return redirect(route('skills.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit')->with(['skill' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {

        $validator = Validator::make($request->all(), [
            'progress_value' => 'required|numeric|min:1|max:100',
        ]);

        if ($validator->fails()) {
            $this->errors($validator->errors());
            return redirect()->back();
        } else {
            $skill->update($request->all());
            Toastr::success('Successfully Updated', 'Message', ["positionClass" => "toast-top-right"]);
        }

        return redirect(route('skills.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        Toastr::success('Successfully Deleted', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    private function errors($errors)
    {
        foreach ($errors->all() as $message) {
            Toastr::error($message, 'Message', ["positionClass" => "toast-top-right"]);
        }
    }
}
