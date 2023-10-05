<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Session;

class taskController extends Controller
{
    
    public function index()
    {
        $data = Task::all();
        return view('task.index')->with('data',$data);
    }

    
    public function create()
    {
        return view('task.create');
    }

   
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('deskripsi', $request->deskripsi);
        $request->validate([
            'judul' =>'required',
            'deskripsi'=>'required'
        ],[
            'judul.required'=>'Judul wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi'
        ]);
        $data = [
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi
        ];

        Task::create($data);
        return  redirect()->to('task')->with('success', 'Berhasil menambahkan task');
    }

    
    public function show(string $id)
    {
        $data = Task::where ('id',$id)->get();
        return view('task.detail')->with('data',$data);
    }

    
    public function edit(string $id)
    {
        $data = Task::where('id', $id)->first();
        return view('task.edit')->with('data', $data);
    }

    
    public function update(Request $request, string $id)
    {

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ];
        Task::where('id', $id)->update($data);
        return redirect()->to('task')->with('success', 'Berhasil melakukan update task');
    }

    
    public function destroy(string $id)
    {
        Task::where('id', $id)->delete();
        return redirect()->to('task')->with('success', 'Berhasil melakukan delete task');
    }

    public function updateTaskStatus(Request $request,string $id){
        $data = [
            'status' => $request->status
        ];
        Task::where('id', $id)->update($data);
        return redirect()->to('task')->with('success', 'Berhasil melakukan update task');
    }

   

    

    public function indexBelumSelesai(){
        $data = Task::where('status','=', 'Belum Selesai')->get();
        return view('task.index')->with('data',$data);
    }

    public function indexSelesai(){
        $data = Task::where('status','=', 'Selesai')->get();
        return view('task.index')->with('data',$data);
    }
}
