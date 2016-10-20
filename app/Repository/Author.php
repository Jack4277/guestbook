<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Contracts\Top;
use Carbon\Carbon;

class Author implements Top
{
    public function top($period)
    {
        $subPeriod = '';
        $top = DB::table('transactions')
            ->join('booksauthors','booksauthors.id','=','transactions.book_id')
            ->join('authors','authors.id','=','booksauthors.author_id')
            ->select('authors.name','authors.id','transactions.created_at',DB::raw('count(authors.id) as count'));

        switch ($period) {
            case 'week': $subPeriod = Carbon::now()->subWeek();
                break;

            case 'month': $subPeriod = Carbon::now()->subMonth();
                break;

            case 'year': $subPeriod = Carbon::now()->subYear();
                break;
        }

        if(!empty($period)) {
            $top->whereRaw('transactions.created_at >= ?',[ $subPeriod ]);
        }

        $top->groupBy('authors.name')
            ->orderBy('count','desc')
            ->limit(10);

        $list = $top->get();
        return $list;
    }
}
