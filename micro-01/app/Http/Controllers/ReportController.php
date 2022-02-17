<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class ReportController extends Controller
{
    public function export()
    {
        $table = '<table>';

        $table .= '<tr>';
        $table .= '<td style="background:#36BFBF; text-align:center; color:#FFF; font-size:18px" colspan="4">Leads</td>';
        $table .= '</tr>';

        $table .= '<tr>';
        $table .= '<td style="background:#FACA2C; text-align:center; color:#FFF; font-size:12px"><b>ID</b></td>';
        $table .= '<td style="background:#FACA2C; text-align:center; color:#FFF; font-size:12px"><b>Nome</b></td>';
        $table .= '<td style="background:#FACA2C; text-align:center; color:#FFF; font-size:12px"><b>Produtos</b></td>';
        $table .= '<td style="background:#FACA2C; text-align:center; color:#FFF; font-size:12px"><b>Criado em</b></td>';
        $table .= '</tr>';

        $tags = Tag::orderBy('id')->with('products')->get();

        foreach ($tags as $tag) {
            $products_names = '';
            foreach ($tag->products as $key => $product) {
                if (count($tag->products) == $key + 1) {
                    $products_names .= $product->name;
                } else {
                    $products_names .= $product->name . ', ';
                }
            }
            $table .= '<tr>';
            $table .= '<td style="border-right:1px solid #E1E1E1; font-size:12px">' . $tag->id . '</td>';
            $table .= '<td style="border-right:1px solid #E1E1E1; font-size:12px">' . $tag->name . '</td>';
            $table .= '<td style="border-right:1px solid #E1E1E1; font-size:12px">' . $products_names . '</td>';
            $table .= '<td style="border-right:1px solid #E1E1E1; font-size:12px">' . (($tag->created_at != null) ? date('d/m/Y', strtotime($tag->created_at)) : '-') . '</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';

        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"LeadsHarmony.xls\"");
        header("Content-Description: PHP Generated Data");
        echo $table;

    }
}
