<?php

namespace App\Http\Controllers;

use App\General\Concretes\InstructorStatus;
use App\Http\Requests\AddInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Clubs;
use App\Models\Fitness;
use CreateInstructorsTable;
use Illuminate\Http\Request;
use App\Models\InstructorModel;

class InstructorController extends Controller
{
    public function index(){
        $club=Clubs::all();
        $fitness=Fitness::all();
        $instructor= InstructorModel::paginate(5); //aduce toate randurile din tabel 
        $statuses= InstructorStatus::getStatus();
        return view('pages.instructors.index',[
            "instructors"=> $instructor,
            "fitnesses"=>$fitness,
            "clubs_id"=>$club
            
            
        ]);
    }

    public function add(Request $request) {
        $fitness= Fitness::all();
        $club=Clubs::all();
        
        $statuses= InstructorStatus::getStatus();
        return view ("pages.instructors.add",[
            'fitnesses'=>$fitness,
            'statuses'=>$statuses,
            'clubs_id'=>$club
        ]);
    }
/**
 * Functia care adauga un nou proiect in tabela "projects
 */
    public function store (AddInstructorRequest $request) {
        if($request ->validated()) {
            $args = $request -> only([
                "name", "description","status","clubs_id","upload_file"
            ]);

            $instructor= new InstructorModel($args);
            
            if ($instructor->save())
            {
                $file = $request->file('upload_file'); 

                $file = $file->storeAs('public/instructors', 'upload_file_'.$instructor->id.'.'.$file->extension());

                $pathArray = explode('/',$file);

                $filePath = 'storage/'.$pathArray[1].'/'.$pathArray[2];

                $instructor->upload_file = $filePath;

                $instructor->fitnesses()->attach($request->only(['workout_type']));


                if ($instructor->save()) {
                    return redirect()->route("add-instructor") -> with("success", "Instructor added succesfully!");
                }
            }
            return redirect()-> route("add-instructor")->with("failed", "Something went wrong!");
            }
            
            }
            public function view(InstructorModel $instructor)
            {
                return view('pages.instructors.view',[
                    'instructors' => $instructor
                ]);
            }

            public function destroy(InstructorModel $instructor)
            {
                if($instructor->delete())
                {
                    return redirect()->route('get-instructor')->with('success','Instructor deleted succesfully');
                }
            }

            public function edit(InstructorModel $instructor)
            {   $club=Clubs::all();
                $fitness=Fitness::all();
                return view('pages.instructors.edit',[
                    'instructors' => $instructor,
                    'statuses'=> InstructorStatus::getStatus(),
                    'fitnesses'=>$fitness,
                    'club_id'=>$club
                ]);
            }

            public function update(UpdateInstructorRequest $request, InstructorModel $instructor)
            {
                if($request->validated())
                {
                    $args = $request->only([
                        'name',
                        'description',
                        "status",
                        "clubs_id",
                        "upload_file"
                    
                    ]);


            if($instructor->update($args))
                
            {

                $file = $request->file('upload_file');

                $file = $file->storeAs('public/instructors', 'upload_file_'.$instructor->id.'.'.$file->extension());

                $pathArray = explode('/',$file);

                $filePath = 'storage/'.$pathArray[1].'/'.$pathArray[2];

                $instructor->update(['upload_file'=>$filePath]);

                $instructor->fitnesses()->detach();

                $instructor->fitnesses()->attach($request->only(['workout_type']));

                    
                        return redirect()->route('edit-instructor',$instructor->id)->with('success','Instructor updated succesfully!');
                    }
                    else{
                        return redirect()->route('edit-instructor',$instructor->id)->with('failed','Instructor not updated!');
                    }
            }
        }
    }