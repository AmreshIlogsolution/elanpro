<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Inertia\Inertia; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use DateTime;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Invoices/Index',[
            'invoices' => Invoice::orderBy('created_at', 'DESC')
            ->when($request->term, function($query,$term){
                $query->where('invoice_number','like','%'.$term.'%');
            })->paginate(4)
             
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Invoices/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        
        try{
            if ($request->hasFile('invoiceUpload') && $request->file('invoiceUpload')->isValid()) {
                $image = $request->file('invoiceUpload');
                $timestamp = time();
                $imageName= $timestamp.'.'.$image->getClientOriginalExtension();              
                $size = ['900x300'];
                $full_path_of_vendor_invoice =$this->resizeAndSaveToAzureBlob($image,$size,$imageName);      
            }
            if ($request->hasFile('invoiceCoverLetter') && $request->file('invoiceCoverLetter')->isValid()) {
                $image = $request->file('invoiceCoverLetter');
                $timestamp = time();
                $imageName= $timestamp.'.'.$image->getClientOriginalExtension();              
                $size = ['900x300'];
                $full_path_of_invoice_Cover_Letter =$this->resizeAndSaveToAzureBlob($image,$size,$imageName);      
            }
             
            $dt = new DateTime();
            $currentDateTime = $dt->format('Y-m-d h:i:s a');
            Invoice::create([
                'invoice_number' => $request->invoiceNumber,
                'invoice_date' => $currentDateTime,
                'invoice_amount' => $request->invoiceAmount,
                'invoice_image' => $full_path_of_vendor_invoice,
                'invoice_coverLetter_image' =>$full_path_of_invoice_Cover_Letter,
                'status' => 'ref_uploaded',
                'invoice_status' => 'inv_uploaded',
                'all_invoices' => 'qwe'
            ]);
  
            return redirect()->route('invoices.index')->with('message', 'Invoice Created Successfully');
        }
        catch(\Exception $error){
            return $error->getMessage();
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {      
        return Inertia::render(
            'Invoices/Edit',
            [
                'invoice' => $invoice
            ]
        );      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Invoice $invoice)
    { 
        try{
           
            if($invoice->invoice_image != $request->form['invoice_image'])
             {                                
                $image = $request->form['invoice_image'];
                $imageName= time().'.'.$request->form['invoice_image']->getClientOriginalExtension();             
                $size = ['900x300'];
                $invoice->invoice_image =$this->resizeAndSaveToAzureBlob($image,$size,$imageName);                 
            }
             
            if($invoice->invoice_coverLetter_image != $request->form['invoice_coverLetter_image'])
            {                                
               $image = $request->form['invoice_coverLetter_image'];
               $imageName= time().'.'.$request->form['invoice_coverLetter_image']->getClientOriginalExtension();             
               $size = ['900x300'];
               $invoice->invoice_coverLetter_image =$this->resizeAndSaveToAzureBlob($image,$size,$imageName);      
          
           }
       
            
                $invoice->invoice_number = $request->form['invoice_number'];
                $invoice->invoice_amount = $request->form['invoice_amount'];
               
                if ($invoice->save()) {
                    return redirect()->route('invoices.index')->with('message', 'Invoice Created Successfully');
                } else {
                   
                }
         
        }
        catch(\Exception $error){
            return $error->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice,$id)
    {
       
    }

    function resizeAndSaveToAzureBlob($file, $size, $imgName)
    {      
       
        $width=500;
        $height=300;
        $sourceImage = imagecreatefromstring(file_get_contents($file));
         
        // Get the original image dimensions
        $sourceWidth = imagesx($sourceImage);
        $sourceHeight = imagesy($sourceImage);
         
        // Calculate the aspect ratios of both images
        $sourceAspectRatio = $sourceWidth / $sourceHeight;
        $targetAspectRatio = $width / $height;
         
        // Calculate the new dimensions for the resized image
        if ($sourceAspectRatio > $targetAspectRatio) {
            $resizeWidth = $width;
            $resizeHeight = $width / $sourceAspectRatio;
        } else {
            $resizeHeight = $height;
            $resizeWidth = $height * $sourceAspectRatio;
        }
 
        // Creating white background
        $targetImage = imagecreatetruecolor($width, $height);
        $whiteColor = imagecolorallocate($targetImage, 255, 255, 255);
        imagefill($targetImage, 0, 0, $whiteColor);
         
        // Calculate the center position for the resized image on the new background
        $centerX = ($width - $resizeWidth) / 2;
        $centerY = ($height - $resizeHeight) / 2;
        // Resize the source image to the calculated dimensions
        imagecopyresampled(
            $targetImage,
            $sourceImage,
            $centerX,
            $centerY,
            0,
            0,
            $resizeWidth,
            $resizeHeight,
            $sourceWidth,
            $sourceHeight
        );
        $outputImagePath = 'resized_image.png';      
        imagepng($targetImage, $outputImagePath);     

        // Generate a unique filename for the resized image
        $resizedFilename = $width . 'x' . $height . $imgName;   
        $path = '/vm/client1/invoice/';
        // Save the resized image to Azure Blob Storage
        Storage::disk('azure')->put($path.$resizedFilename, file_get_contents($outputImagePath));
        $fullPathOfVendorInvoice = 'https://swimlocker.blob.core.windows.net/wmslocker/wmsMobile'.$path.$resizedFilename;
        return $fullPathOfVendorInvoice;
       
    }

    public function paginateArray($data, $perPage = 15)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);
        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}
