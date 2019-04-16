<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        return Machine::all();
    }

    public function drinks(Machine $machine)
    {
        // Todo: implement ingredient algorithm to determine if drinks are available
        return Drink::all();
    }

    public function orders(Request $request, Machine $machine)
    {
        $status = $request->get('status');

        return $machine->orders()
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->with('drinks.ingredients')
            ->paginate();
    }
}
