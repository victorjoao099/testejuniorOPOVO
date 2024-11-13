<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class details extends Controller
{
    public function show(User $user, news $news)
    {

        return view('dashboard', compact('news'));
    }

    public function adicoesPorDia()
    {
        $userId = Auth::id();
    
        $startDate = Carbon::now()->subDays(14)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $startDate->setTimezone('UTC');
        $endDate->setTimezone('UTC');
    
        $additionsPerDay = News::where('id_autor', $userId)
                            ->whereBetween('publicado_em', [$startDate, $endDate])
                            ->selectRaw('DATE(publicado_em) as date, COUNT(*) as count')
                            ->groupBy('date')
                            ->orderBy('date', 'asc')
                            ->get();

        $formattedAdditions = $additionsPerDay->mapWithKeys(function ($item) {
            return [$item->date => $item->count];
        });
    
        $allDates = collect();
        for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
            // Se o dia não estiver nos dados, adicionar com valor 0
            $dateString = $date->toDateString();
            $allDates[$dateString] = $formattedAdditions->get($dateString, 0);
        }
        return response()->json($allDates);

    }
    
}
