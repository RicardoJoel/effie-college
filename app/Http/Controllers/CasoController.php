<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Caso;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function getBrand($id)
    {
        $caso = Caso::find($id);
        return $caso ? $caso->brand->name : '';
    }

    public function getByEdition($id)
    {
        $casos = Caso::leftJoin('brands','brands.id','casos.brand_id')
                    ->where('casos.edition_id',$id)
                    ->orderBy('brands.name')
                    ->get('casos.*');
        $array = [];
        foreach ($casos as $caso) {
            $array[] = array(
                'edition' => $caso->edition->name,
                'brand' => $caso->brand->name,
                'brief' => $caso->brief,
                'audio' => $caso->audio,
                'visual' => $caso->visual,
                'whole' => $caso->whole
            );
        }
        return json_encode($array);
    }

    public function downloadBrief($edition, $brand)
    {
        $brand = self::rmvAccents($brand);
        return Storage::download($edition.'_EffieCollege_Brief_'.$brand.'.pdf');
    }

    public function downloadAudio($edition, $brand)
    {
        $brand = self::rmvAccents($brand);
        return Storage::download($edition.'_EffieCollege_'.($brand === 'Entel Peru' ? 'Answers_' : 'Audio_').$brand.($brand === 'Entel Peru' ? '.zip' : '.mp4'));
    }

    public function downloadVisual($edition, $brand)
    {
        $brand = self::rmvAccents($brand);
        return Storage::download($edition.'_EffieCollege_Visual_'.$brand.($brand === 'Entel Peru' ? '.pdf' : '.zip'));
    }

    public function downloadWhole($edition, $brand)
    {
        $brand = self::rmvAccents($brand);
        return Storage::download($edition.'_EffieCollege_Kit_'.$brand.'.zip');
    }

    public function downloadForm($edition)
    {
        return Storage::download($edition.'_Formulario_participacion.docx');
    }

    protected function rmvAccents($string)
    {
        $not_allowed = ["á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹"];
        $allowed = ["a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E"];
        return str_replace($not_allowed, $allowed, $string);
    }
}