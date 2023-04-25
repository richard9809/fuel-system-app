<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Transaction;

class CheckTransactionCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $driver = $request->input('driver');

        $previousTransaction = Transaction::where('driver', $driver)
            ->where(function ($query) {
                $query->whereNotNull('receipt')
                    ->orWhere('rejected', 1);
            })
            ->latest('created_at')
            ->first();
        
        if($previousTransaction){
            return response()->json(['message' => 'Last transaction is pending. Please complete the previous transaction before posting a new one.'], 400);
        }

        return $next($request);
    }
}
