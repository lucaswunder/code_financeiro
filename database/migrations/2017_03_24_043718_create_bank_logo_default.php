<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Migrations\Migration;

class CreateBankLogoDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $file_name = env("BANK_LOGO_DEFAULT");
        $logo = new \Illuminate\Http\UploadedFile(
            storage_path('app/files/banks/logos/' . $file_name),
            $file_name
        );
        $destFile = \CodeFin\Models\Bank::LOGOS_DIR;

        Storage::disk('public')->putFileAs($destFile, $logo, $file_name);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $name = env('BANK_LOGO_DEFAULT');
        $path = \CodeFin\Models\Bank::LOGOS_DIR . '/' . $name;
        Storage::disk('public')->delete($path);
    }
}
