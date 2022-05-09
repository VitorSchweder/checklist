<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Cakes;
use App\Http\Requests\Cake\SaveCake;

class CakeController extends Controller
{
    protected Cakes $cakes;

    public function __construct(Cakes $cakes) 
    {
        $this->cakes = $cakes;
    }

    public function index()
    {    
        return $this->cakes->paginate();
    }

    public function store(SaveCake $request)
    {
        return $this->cakes->create($request->all());
    }
    
    public function show($id)
    {
        return $this->cakes->byId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->cakes->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->cakes->delete($id);
    }
}
