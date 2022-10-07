<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('form_handlers', function (Blueprint $table) {
         $table->id();
         $table->timestamps();
         // personal info
         $table->text('student-name-bangla')->required();
         $table->text('student-name-english')->required();
         $table->string('birth-certificate-number')->required();
         $table->string('birth-date')->required();
         $table->text('student-mobile')->required();
         $table->string('blood-group')->required();
         $table->string('gender')->required();
         $table->string('marital-status')->required();
         // parents info
         $table->text('father-name-bangla')->required();
         $table->text('father-name-english')->required();
         $table->text('mother-name-bangla')->required();
         $table->text('mother-name-english')->required();
         $table->text('father-mobile')->required();
         $table->text('mother-mobile')->required();
         $table->string('father-nid')->required();
         $table->string('mother-nid')->required();
         $table->text('father-birth-date')->required();
         $table->text('mother-birth-date')->required();

         // present address info
         $table->text('pres_division')->required();
         $table->text('pres_district')->required();
         $table->text('pres_upozilla')->required();
         $table->text('pres-city-corp')->required();
         $table->string('pres-post-code')->required();
         $table->longText('pres-address')->required();

         // permanent address info
         $table->text('perm_division')->required();
         $table->text('perm_district')->required();
         $table->text('perm_upozilla')->required();
         $table->text('perm-city-corp')->required();
         $table->string('perm-post-code')->required();
         $table->longText('perm-address')->required();

         // previous education info
         $table->text('pe_division')->required();
         $table->text('pe_district')->required();
         $table->text('pe_upozilla')->required();
         $table->text('pe-board')->required();
         $table->string('pe-passing-year')->required();
         $table->string('pe-roll')->required();
         $table->text('pe-institute')->required();
         $table->string('pe-gpa')->required();
         $table->text('pe-exam-name')->required();
         $table->text('pe-technology-trade')->required();
         $table->string('pe-att-rate')->required();

         // present education info
         $table->text('ce_division')->required();
         $table->text('ce_district')->required();
         $table->text('ce_upozilla')->required();
         $table->text('ce-institute-name')->required();
         $table->string('ce-semester')->required();
         $table->text('ce-technology-trade')->required();
         $table->string('ce-shift')->required();
         $table->text('ce-group')->required();
         $table->string('ce-roll')->required();
         $table->string('ce-reg')->required();

         // guardian info
         $table->text('guardian-name-bangla')->required();
         $table->text('guardian-name-english')->required();
         $table->text('guardian-mobile')->required();
         $table->string('guardian-nid')->required();
         $table->string('guardian-birth-date')->required();
         $table->string('relationship')->required();

         // condition info
         $table->string('cost-borne')->required();
         $table->string('disabilities')->required();
         $table->string('ethnic')->required();
         $table->string('ffq')->required();
         $table->string('scholarship')->required();

         // payment info
         $table->string('payment-method');
         $table->text('mobile-bank-provider')->nullable();
         $table->text('mobile-bank-account')->nullable();

         $table->text('bank-name')->nullable();
         $table->text('bank-branch')->nullable();
         $table->string('bank-acc-number')->nullable();
         $table->text('bank-acc-name')->nullable();
         $table->string('bank-acc-type')->nullable();
         $table->string('bank-routing')->nullable();


         // other info
         $table->text('formal_image_path')->required();
         $table->text('signature_image_path')->required();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('form_handlers');
   }
};
