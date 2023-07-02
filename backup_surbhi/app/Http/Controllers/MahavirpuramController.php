<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\InvoiceModel;
use App\Models\InvoiceDetailModel;
// use Illuminate\Support\Facades\Request as Input;
class MahavirpuramController extends Controller
{
    //MahavirpuramBillGenerator->mahavirpuramBillGenerator
    // MahavirpuramDonaterList->mahavirpuramDonaterList
    // MahavirpuramDonaterReciepts->mahavirpuramDonaterReciepts
    // MahavirpuramDonaterInvoice->mahavirpuramDonaterInvoice
    public function createInvoice(){
        $admin_id = session('admin_id');
        if($admin_id != ''){
            $res = InvoiceModel::max('bill_no');
        
            // echo $res;
            return view('mahavirpuramInvoice')->with('bill_no',$res);
        }else{
            return view('login');
        }
       
    }
    public function mainInvoiceList(){
        $admin_id = session('admin_id');
        if($admin_id != ''){
            $res = InvoiceModel::select('*')->where('trust_id',2)->get();
            return view('mahavirpuramDonaterList')->with('mainInvoices',$res);
        }else{
            return view('login');
        }
        
    }
    public function detailInvoiceList(Request $request){
        $admin_id = session('admin_id');
        if($admin_id != ''){
            $id = $request->invoice_id;
        $invoicesRes = InvoiceDetailModel::select('*')->where('invoice_master_id',$id)->get();
        $invoicesMasterRes = InvoiceModel::select('total_amount','bill_no')->where('invoice_master_id',$id)->get();
        $invoicesMasterRes = $invoicesMasterRes[0];
        // $invoicesMasterRes->total_amount =  $invoicesMasterRes->total_amount/$invoicesRes->count();
        // echo $invoicesMasterRes->total_amount;
        return view('mahavirpuramDonaterReciepts')->with('invoicesRes',$invoicesRes)->with('invoicesMasterRes',$invoicesMasterRes);
        }else{
            return view('login');
        }
       
    }
    public function viewInvoice(Request $request){
        $admin_id = session('admin_id');
        if($admin_id != ''){
            $id = $request->invoice_id;
            $invoicesRes = InvoiceDetailModel::select('*')->where('detail_id',$id)->get();
            $invoicesRes= $invoicesRes[0];
            $invoice_master_id = $invoicesRes->invoice_master_id;
            $invoicesMasterRes = InvoiceModel::select('*')->where('invoice_master_id',$invoice_master_id)->get();
            $invoicesMasterRes = $invoicesMasterRes[0];
            return view('mahavirpuramDonaterInvoice')->with('invoicesRes',$invoicesRes)->with('invoicesMasterRes',$invoicesMasterRes);
        }else{
            return view('login');
        }
       
    }
    public function addInvoice(Request $request){
        $admin_id = session('admin_id');
        if($admin_id != ''){
            $data  = $request->all();
     $date = $data['date'];
     $name = $data['name'];
     $totalAmount = $data['totalAmount'];
     $address = $data['address'];
     
     $res = InvoiceModel::max('bill_no');
     $invoice = [
        'invoice_master_id '=> null,
        'bill_no' =>$res+1,
        'master_date' => $date,
        'invoice_client_name' => $name,
        'total_amount' => $totalAmount,
        'invoice_client_address' => $address,
        'trust_id' => 2,
        
     ];
     $invoice_master_id=0;
     $invoice_master_id = InvoiceModel::create($invoice);
     $invoice_master_id= $invoice_master_id->id;
     $multipleForms =  $data['dynamicForm'];
     $pushData['formData'] =Array();
     $count = 0;
     foreach($multipleForms as $row){
        // print_r($row);
        
        $pushData['formDate'] = $row['date'];
        $pushData['amountReceived'] = $row['amountReceived'];
        $pushData['paymentMode'] = $row['paymentMode'];
        $pushData['panCardNumber'] = $row['panCardNumber'];
        $pushData['chequeNumber'] = $row['chequeNumber'];
        $pushData['chequeDate'] = $row['chequeDate'];
        $pushData['drawnDate'] = $row['drawnDate'];
        $pushData['buildingFund'] = $row['buildingFund'];
        $pushData['youthActivities'] = $row['youthActivities'];
        $pushData['socialAwareness'] = $row['socialAwareness'];
        $pushData['medicalAid'] = $row['medicalAid'];
        $pushData['amountInWords'] = $row['amountInWords'];
        $pushData['culturalPrograms'] = $row['culturalPrograms'];
        $pushData['payment_method'] ='';
        $pushData['cash'] = 0;
        $pushData['cheque'] = 0;
        
        if($pushData['paymentMode'] == 'cash'){
            $pushData['payment_method'] = 'Cash';
            $pushData['cash'] = $pushData['amountReceived'];
            $pushData['cheque'] = 0;
        }else if($pushData['paymentMode'] == 'cheque'){
            $pushData['payment_method'] = 'Cheque';
            $pushData['cheque'] = $pushData['amountReceived'];
            $pushData['cash'] = 0;
        }
        $count++;
        $invoiceDetails = [
            'invoice_master_id' => $invoice_master_id,
            'date' => $pushData['formDate'],
            'splitBill_no' => $count,
            'amount_in_words' => $pushData['amountInWords'],
            'pancard_no' => $pushData['panCardNumber'],
            'building_funds' => $pushData['buildingFund'],
            'youth_activities' => $pushData['youthActivities'],
            'cultural_programs' => $pushData['culturalPrograms'],
            'social_awareness' => $pushData['socialAwareness'],
            'medical_aid' => $pushData['medicalAid'],
            'cheque_number' => $pushData['chequeNumber'],
            'cheque_date' => $pushData['chequeDate'],
            'drawn_on' => $pushData['chequedrawnDate'],
            'cheque_amount' => $pushData['cheque'],
            'cash_amount' => $pushData['cash'],
            'payment_method' => $pushData['payment_method'],
            'donor_address' => $address, 
        ];

        $res = InvoiceDetailModel::create($invoiceDetails);
        
     }
     if($res != ''){
        echo "success";
     }else{
        echo "error";
     }
        }else{
            return view('login');
        }
     
    }
}








// amountReceived
// : 
// 2
// buildingFund
// : 
// "2"
// chequeDate
// : 
// ""
// chequeNumber
// : 
// ""
// culturalPrograms
// : 
// ""
// date
// : 
// "03 June 2023"
// drawnDate
// : 
// ""
// medicalAid
// : 
// ""
// paymentMode
// : 
// "cash"
// socialAwareness
// : 
// ""
// youthActivities
// : 
// ""












