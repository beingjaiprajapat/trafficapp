<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignalSequence;


class SignalLightsController extends Controller
{
    public function index()
    {
        return view('signal-lights.index');
    }

    public function sumbitAction(Request $request)
    {
        $request->validate([
            'sequence' => 'required|string',
            'green_interval' => 'required|integer|min:1',
            'yellow_interval' => 'required|integer|min:1',
        ]);


         $sequence = strtoupper($request->input('sequence'));

        if (strpos($sequence, ',') !== false) {
            $sequence = explode(',', $sequence);
        } else {
            $sequence = str_split($sequence);
        }

        $greenInterval = $request->input('green_interval');
        $yellowInterval = $request->input('yellow_interval');
        $color = '';
        $sequenceColors = [];
        foreach ($sequence as $signal) {
            switch (strtoupper($signal)) {
                case 'A':
                case 'a':
                    $color = 'red';
                    break;
                case 'B':
                case 'b':
                    $color = 'yellow';
                    break;
                case 'C':
                case 'c':
                    $color = 'orange';
                    break;
                case 'D':
                case 'd':
                    $color = 'green';
                    break;
                default:
                    $color = null;
                    break;
            }
    
            $sequenceColors[] = $color;
        }
    
        $sequenceData = SignalSequence::create([
            'sequence' => json_encode($sequenceColors),
            'green_interval' => $greenInterval,
            'yellow_interval' => $yellowInterval,
        ]);

        return response()->json(['message' => 'Signal lights sequence completed successfully']);
    }

    public function start(Request $request)
    {
        $lastSignalSequence = SignalSequence::latest()->first();

        if (!$lastSignalSequence) {
            return response()->json(['message' => 'No signal sequence found, please fill the sequnce']);
        }

        return response()->json($lastSignalSequence);
    }
}
