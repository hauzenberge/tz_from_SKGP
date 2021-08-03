<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pages;
use Mpdf;
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;

class PagesController extends Controller
{
    public function index(){
        return view('pages',[
            'pages' => Pages::all(),
        ]);
    }
    public function toPDF(){
        $mpdf = new Mpdf\Mpdf();
        $page = Pages::find(4);
       // dd(Pages::find(6)->name);
       $html = '<div class="row">      
        <div class="col-12 col-md-4"> 
            <div class="card">
                <div class="card-header">
                    <h5>'.$page->name.'</h5>
                </div>
                 <div class="card-body">                        
                        <div class="barcode">'.
                            $page->barcode
                        .'</div>                        
                 </div>
            </div>
        </div>  
</div>';
       //dd(htmlentities($html));
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function GeneratePDF(){
        $dompdf = new DOMPDF();

        $html = view('pdf',[
            'pages' => Pages::orderBy('id', 'desc')->limit(2)->get(),
        ]);

        $dompdf->load_html($html);
        $dompdf->render();

        $dompdf->stream("pages.pdf");
        return redirect('pages');
    }
}
