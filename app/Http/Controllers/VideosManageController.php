<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosManageController extends Controller
{
    // CRUD
    /** R -> Retrieve -> Llista
     */
    public function index()
    {
        return view('videos.manage.index');
    }

    /** C -> Create -> Mostrarà el formulari de creació */
    public function create()
    {
        //
    }

    /** C -> Create -> Guardara a base de dades el nou Video */
    public function store(Request $request)
    {
        //
    }

    /** R-> NO LLISTA -> Individual ->
     */
    public function show($id)
    {
        //
    }

    /** U -> update - > Form */
    public function edit($id)
    {
        //
    }

    /** U -> update - > Processarà el Form i guardara las modificacions */
    public function update(Request $request, $id)
    {
        //
    }

    /** D -> DELETE
     */
    public function destroy($id)
    {
        //
    }
}
