<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('ident_key')->nullable();
            $table->integer('ident_ano')->nullable();
            $table->integer('person_id');
            $table->string('sei');
            $table->integer('report')->default(0);
            $table->string('nota_def_cbmerj')->nullable();
            $table->string('nota_sigma_cbmerj')->nullable();
            $table->string('nota_craf_cbmerj')->nullable();
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->string('doc3')->nullable();
            $table->string('craf')->nullable();
            $table->integer('closed')->default(0);
            $table->timestamps();
        });
        DB::unprepared('
        CREATE TRIGGER trigger_ident_key BEFORE INSERT ON `applications` FOR EACH ROW
         BEGIN

    DECLARE last_ident_key INT;
    SELECT max(ident_key) INTO last_ident_key FROM applications WHERE ident_ano = YEAR(NOW());
    IF(last_ident_key is null) THEN
    SET last_ident_key = 0;
    END IF;
    SET NEW.ident_key = last_ident_key + 1;
    SET NEW.ident_ano = YEAR(NOW());
    END
         ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
