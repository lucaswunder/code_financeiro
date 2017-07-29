<?php

use CodeFin\Repositories\Interfaces\CategoryExpanseRepository;
use Illuminate\Database\Seeder;

class CategoryExpensesTableSeeder extends Seeder
{
    use \CodeFin\Repositories\Traits\GetClientsTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = $this->getClients();
        factory(\CodeFin\Models\CategoryExpanse::class, 10)
            ->make()
            ->each(function ($category) use ($clients) {
                $client = $clients->random();
                $category->client_id = $client->id;
                $category->save();
            });
        $categoriesRoot = $this->getCategoriesRoot();
        foreach ($categoriesRoot as $root) {
            factory(\CodeFin\Models\CategoryExpanse::class, 2)
                ->make()
                ->each(function ($child) use ($root) {
                    $child->client_id = $root->client_id;
                    $child->save();
                    $child->parent()->associate($root);
                    $child->save();
                });
        }
    }
    private function getCategoriesRoot()
    {
        /** @var CategoryExpanseRepository $repository */
        $repository = app(CategoryExpanseRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}