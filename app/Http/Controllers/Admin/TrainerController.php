<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainerRequest;
use App\Models\Trainer;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    use Upload;
    public function index()
    {
        $trainers = Trainer::select()->orderBy('id','DESC')->get();

        return view('admin.trainers.index',compact('trainers'));
    }

    public function create()
    {
        return view('admin.trainers.create');
    }

    public function store(TrainerRequest $request)
    {
        $imageName = '';
        if ($request->has('image')) {
            $imageName = $this->uploadImage($request->image, 'trainers');

        }

        $trainer =  Trainer::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'spec' => $request->input('spec'),
            'img' => $imageName,
        ]);
        if(!$trainer)
            return back();
        return redirect()->route('admin.showTrainer');
    }

    public function edit($id)
    {
        $data['trainer'] = Trainer::findOrFail($id);
        if(!$data['trainer'])
            return redirect()->route('admin.showTrainer');
        return view('admin.trainers.edit',$data);
    }


    public function update (TrainerRequest $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        $imageName = '';
        if($request->hasFile('image')){
            Storage::disk('trainers')->delete($trainer->img);
            $imageName = $this->uploadImage($request->image, 'trainers');
        }
        else{
            $imageName = $trainer->img;
        }


        $updatedTrainer =  $trainer->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'spec' => $request->input('spec'),
            'img' => $imageName,
        ]);

        if(!$updatedTrainer)
            return back();
        return redirect()->route('admin.showTrainer') ;
    }

    public function delete($id)
    {
        $trainer = Trainer::findOrFail($id);
        Storage::disk('trainers')->delete($trainer->img);
        $deletedTrainer = $trainer->delete();
        if(!$deletedTrainer)
            return back();
        return redirect()->route('admin.showTrainer') ;

    }
}
