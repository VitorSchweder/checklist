<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CakesInterestedList;
use App\Repositories\Cakes;
use App\Jobs\SendCakeListMail;
use Carbon\Carbon;

class CakeInterestedListController extends Controller
{
    protected CakesInterestedList $cakesInterestedList;
    protected Cakes $cakes;

    public function __construct(CakesInterestedList $cakesInterestedList, Cakes $cakes) 
    {
        $this->cakesInterestedList = $cakesInterestedList;
        $this->cakes = $cakes;
    }

    public function index()
    {    
        return $this->cakesInterestedList->paginate();
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $result = $this->cakesInterestedList->create($requestData);

        foreach ($requestData as $list) {
            $cake = $this->cakes->byId($list['cake_id']);
            $emailJob = (new SendCakeListMail($list['email'], $cake))->delay(Carbon::now()->addMinutes(1));
            dispatch($emailJob);
        }

        return $result;
    }
    
    public function show($id)
    {
        return $this->cakesInterestedList->byId($id);
    }

    public function destroy($id)
    {
        return $this->cakesInterestedList->delete($id);
    }
}
