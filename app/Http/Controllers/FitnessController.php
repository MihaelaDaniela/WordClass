<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFitnessRequest;
use App\Http\Requests\UpdateFitnessRequest;
use App\Models\Fitness;
use Illuminate\Http\Request;

class FitnessController extends Controller
{
    public function index() {
        $fitness= Fitness::paginate(5);

        return view("pages.fitness.index",[
            'fitnesses'=>$fitness,
       ]);

    }


    public function search(Request $request)
       {
          
        $name=$request->post('search_fitness');
        $fitness = Fitness::where('name','like','%'.$name.'%')
           
        ->paginate(5);
   
   
           
        return view('pages.fitness.index',[
           'fitnesses' => $fitness
           ]);
       }

    
    public function add() {
        
        return view ("pages.fitness.add");
    }
/**
 * Functia care adauga un nou proiect in tabela "projects
 */
    public function store (AddFitnessRequest $request) {
        if($request ->validated()) {
            $args = $request -> only([
                "name",
                "description",
                "intensity_level",
                "equipment",
                "upload_file"
                
            ]);

        $fitness = new Fitness($args);

        if ($fitness->save())
        {
            $file = $request->file('upload_file'); 

            $file = $file->storeAs('public/fitnesses', 'upload_file_'.$fitness->id.'.'.$file->extension());

            $pathArray = explode('/',$file);

            $filePath = 'storage/'.$pathArray[1].'/'.$pathArray[2];

            $fitness->upload_file = $filePath;


            if ($fitness ->save()) {
            return redirect()->route("add-fitness") -> with("success", "Workout type added succesfully!");
                }
        }
        return redirect()-> route("add-fitness")->with("failed", "Something went wrong!");
    }
}
public function view(Fitness $fitness)
{   
    return view('pages.fitness.view',[
        'fitness' => $fitness,
        
    ]);
}

public function destroy(Fitness $fitness)
{
    if($fitness->delete())
    {
        return redirect()->route('get-fitness')->with('success','Workout deleted succesfully');
    }
    
}

public function edit(Fitness $fitness)
{   
    return view('pages.fitness.edit',[
        'fitness' => $fitness,
    ]);
}

public function update(UpdateFitnessRequest $request, Fitness $fitness)
{
    if($request->validated())
    {
        $args = $request->only([
            'name',
            'description',
            'intensity_level',
            'equipment',
            'upload_file'
            
        ]);
    
                if($fitness->update($args))
                {

                    $file = $request->file('upload_file');
        
                    $file = $file->storeAs('public/fitnesses', 'upload_file_'.$fitness->id.'.'.$file->extension());
        
                    $pathArray = explode('/',$file);
        
                    $filePath = 'storage/'.$pathArray[1].'/'.$pathArray[2];
        
                    $fitness->update(['upload_file'=>$filePath]);

                    return redirect()->route('edit-fitness',$fitness->id)->with('success','Workout updated succesfully!');
                }
                else{
                    return redirect()->route('edit-fitness',$fitness->id)->with('failed','Workout not updated!');
                }
            }
        }
}
