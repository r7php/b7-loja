<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Advertise;
use Illuminate\Support\Facades\Auth;

use app\Models\User;
use PhpParser\Node\Expr\AssignOp\Concat;

class DashboardController extends Controller
{
    //

    public function csvPage(){
        return view('upload');
    }
    public function upload(Request $request){
          $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);


             $file = $request->file('csv_file');

        // Cria pasta public/uploads se não existir
        $uploadDir = public_path('uploads');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Salva o arquivo na pasta public/uploads com nome original
        $filePath = $uploadDir . '/' . $file->getClientOriginalName();
        $file->move($uploadDir, $file->getClientOriginalName());

        // Lê o conteúdo do CSV
        $data = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ';')) !== false) {
              //  $data[] = $row;
                echo $row[0].'<br>';
            }
            // foreach($data as $d){
            //     echo $d[0].'<br>';
            // }
            fclose($handle);
        }
    }


    public function my_account(){
        $id = Auth::user()->id;
       $data['user'] = User::find($id);
        $data['state'] = State::All();
        return view('dashboard.my_account',$data);
    }

    public function my_account_action(UpdateProfileRequest $r){
        $data = $r->only(['name','email','state_id']);
        $usersId = Auth::user()->id;
        //$userId = Auth::user()->id;
        $user = User::find($usersId);
        $user->update($data);
        $ms['msg'] = 'Feito';
        return redirect()->route('my_account')->with('success','Perfil atualizado com sucesso');



    }
    public function my_ads(){
        $user = Auth::user();
        $advertise = $user->advertises;

       // dd($advertise);
      //  dd($advertise[0]->images);

        return view('dashboard.my_ads',compact('advertise'));
    }
}
