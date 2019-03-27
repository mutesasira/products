<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
Use App\products;
use Session;
use Illuminate\Support\Facades\Storage;

class productsController extends Controller
{
    public function download(Request $request){
        return Storage::download($request->certificate);
    }

    public function addproduct(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'cprice'=>'required',
            'sprice'=>'required',
            'qty'=>'required'
        ]);

        $FilePath = null;
        if($request->file('supplier_certificate')){
            $FilePath = Storage::putFile(
                'supplier_certificate',
                $request->file('supplier_certificate')
            );
        }

        $logged_in_user = Auth::user();

        $postData = [
            'name'=> $request->name,
            'amount_in_stock' => $request->qty,
            'qty'=>$request->qty,
            'cprice'=>$request->cprice,
            'sprice'=>$request->sprice,
            'expdate' => $request->exdate,
            'user_id' =>$logged_in_user->id
        ];

        products::create($postData);
        Session::flash('data has been successfully added');
        return $this->show();
    }

    public function show(){
        $pdt = products::all()->where('user_id', Auth::user()->id);

        return view('view', compact('pdt',$pdt));
    }

    public function editproduct(Request $request){

        $path=null;
        if($request->file('supplier_certificate')){
            Storage::delete($request->certificateold );
            $path = Storage::putFile('supplier_certificate',$request->file('supplier_certificate'));
        }
        
        products::where('id', $request->_id)->update(["name"=> $request->name, 
                                                "qty"=> $request->qty,
                                                "cprice"=> $request->cprice,
                                                "sprice"=> $request->sprice,
                                                "expdate"=>$request->exdate,
                                                'user_id' => Auth::user()->id,
                                                'supplier_certificate'  =>$path                                                 
                                                ]);
            
        
        //store status message
        Session::flash('success_msg', 'product edited');
        return $this->show();
    }

    // Remove the specified resource from storage.
    public function destroy( Request $request)
    {
        Storage::delete($request->certificate );
        
        $del = products::where('id', $request->_id)->delete();
        return $this->show();
    }
}
 