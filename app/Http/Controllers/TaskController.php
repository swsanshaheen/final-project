<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
class Taskcontroller extends Controller
{
  public function index(){
    //$tasks = DB::table('tasks') -> get();
    $tasks=Task::all();
    $tasks= DB::table('tasks')->orderBy('name' ,'asc')->get();
    return view('tasks',compact('tasks'));

  }
 public function store(Request $request){
 // DB::table('tasks')-> insert([
   //'name'=>$request -> name,
   //'created_at' =>now(),
   //'updated_at' =>now()
  //]);
  $task= new Task();
   $task->name=$request->name ;
   $task->save();
   return 'store';
 }

 public function delete($id){
  //DB::table('tasks')->where('id','=',$id)->delete();
  Task::find($id)->delete();
  //Task::find($id)
  //Task->delete();

  return redirect()->back();
 }

public function update(Request $request ,$id){
  //$data=array();
  //$data['name']=$request->name;
  //DB::table('tasks')->where('id',$id)->update($data);
  //$tasks=Task::all();
  //return view('tasks' , compact('tasks'));
  $task = Task::find($id);
  $task -> name = $request ->name;
  $task -> save();

}


}
