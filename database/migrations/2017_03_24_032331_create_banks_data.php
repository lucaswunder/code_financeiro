<?php

use CodeFin\Repositories\Interfaces\BankRepository;
use Illuminate\Database\Migrations\Migration;
Use Illuminate\Support\Facades\Storage;

class CreateBanksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var BankRepository $repository */
        $repository = app(BankRepository::class);

        foreach ($this->getData() as $bankArray) {
            $repository->create($bankArray);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** @var \CodeFin\Repositories\Interfaces\BankRepository $repository */
        $repository = app(\CodeFin\Repositories\Interfaces\BankRepository::class);
        $repository->skipPresenter(true);
        $count = count($this->getData());
        foreach (range(1,$count) as $value) {
            $model = $repository->find($value);
            $path = \CodeFin\Models\Bank::LOGOS_DIR . '/' . $model->logo;
            Storage::disk('public')->delete($path);
            echo "** Imagem do '$model->name' deletada: " . $model->logo . "\n";
            $model->delete();
        }
    }

    public function getData()
    {
        return [
            [
                'name' => 'Bradesco',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bradesco.JPG'),
                    'bradesco.JPG'
                )
            ],
            [
                'name' => 'Banco do Brasil',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/brasil.gif'),
                    'brasil.gif'
                )
            ],
            [
                'name' => 'Caixa',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/caixa.png'),
                    'caixa.png'
                )
            ],
            [
                'name' => 'Itaú',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/itau.jpg'),
                    'itau.jpg'
                )
            ],
            [
                'name' => 'Santander',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/santander.png'),
                    'santander.png'
                )
            ],
        ];
    }
}
