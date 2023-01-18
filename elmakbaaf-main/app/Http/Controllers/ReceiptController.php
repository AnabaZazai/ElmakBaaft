<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Models\Receipt;
use App\Models\Suplier;
use App\Models\Receiptcart;
use App\Models\ReceiptProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
Use PDF;

class ReceiptController extends Controller
{

    public function makereceipt()
    {
      
        $supliers= Suplier::get();
        $receiptcart = [];
        if(Auth::user()){
           $user_id = Auth::user()->id;
           
           $receiptcart=Receiptcart::where('user_id',$user_id)->get();
        }
       
         return view('PurcheseManagement.Receipt.MakeReceipt', compact("receiptcart","supliers"));

    }
    

    public function receiptcart(Request $request)
    {

        $receiptcart=$request->toArray();
        $receiptcart['user_id']=Auth::user()->id;   
        Receiptcart::create($receiptcart);
        // return $request;
        return redirect(route('AllProduct_show'));
       
    }

    public function UpdateReceiptItemQuantity(Request $request)
    {
        //cheaking if data is coming or not
        if($request->ajax()){
            $data = $request->all();
            //  echo"<pre>";print_r($data); die;
            //  //update here 
            Receiptcart::where('id',$data['cartid'])->update(['quantity'=>$data['quantity']]);
            //get all cart item
            $receiptCartitems =Cart::userCartitems();
            return response()->json(['view'=>(String)View::make('receiptcart')->
            with(compact('receiptCartitems'))]);
        }


    }

    public function store(Request $request)
    {
          
        $receipt = new Receipt;
        
        $receipt->receipt_date = $request->receipt_date; 
        $receipt['user_id']=Auth::user()->id;      
        $receipt->suplier_id = $request->suplier_id;
        $receipt->total_price = $request->total_price;
        $receipt->total_amount = $request->total_amount;       
        $receipt->total_square_meters = $request->total_square_meters;
        $receipt->total_bales = $request->total_bales;
         $receipt->save();
        //    return $request;
         
        
        $receipt_id = DB::getPdo()->lastInsertId();
        $receiptcart = Receiptcart::where('user_id',Auth::user()->id)->get();
        foreach($receiptcart as $key =>$item)
        {
            $receiptcart = new ReceiptProduct;
            $receiptcart->product_id = $item['product_id'];
            $receiptcart->receipt_id=$receipt_id;           
            $receiptcart->user_id = Auth::user()->id;

            $receiptcart->quantity = $item['quantity'];
            $receiptcart->save();
        
           }
        
           Receiptcart::delete();
           return redirect(route('makereceipt'));
    }


    public function AllReceipt(Request $request){
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $receipts =  Receipt::with('receipt_product')->Where('receipt_date','like',"%$search%")->orWhere('total_amount','like',"%$search%")->paginate(10);
          
        }
    
        else{
           
            $receipts =  Receipt::with('receipt_product')->orderBy('id','Desc')->paginate(10);   
        }
        
              
        return view('PurcheseManagement.Receipt.AllReceipt')->with(compact('receipts','search'));

    }

    public function receipt_product_detail($id){  
        $ReceiptProductDetail =Receipt::with('receipt_product')->where('id',$id)->first();
         return view('PurcheseManagement.Receipt.ReceiptProductDetail')->with(compact('ReceiptProductDetail'));
        
   } 

    public function show(Receipt $receipt)
    {
        //
    }

   
    public function edit(Receipt $receipt)
    {
        //
    }

    
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    public function destroy($id)
    {
        $receiptcart =  Receiptcart::find($id);
        $receiptcart->delete();
        return redirect(route('makereceipt'));
    }


    
    public function PrintPdfReceipt($id){
        $ReceiptProductDetail =Receipt::with('receipt_product')->where('id',$id)->first();      
        $pdf = PDF::loadView('pdf.receipt', ['ReceiptProductDetail' =>  $ReceiptProductDetail])->setPaper('A4','landscape');
        return $pdf->download('Receipt '. Carbon::today(). '.pdf');
          
    }

}
