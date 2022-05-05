<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TokenCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:category {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id=$this->argument('id');
        $category_token = DB::table('products')
        ->select('categories.token')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.id', '=', $id);
        $this->line($category_token->first()->token);
        return $category_token->first()->token;
    }
}
