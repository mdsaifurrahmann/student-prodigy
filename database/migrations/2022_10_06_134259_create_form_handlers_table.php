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
         $table->text('student_name_bangla')->required();
         $table->text('student_name_english')->required();
         $table->string('birth_certificate_number')->required();
         $table->string('birth_date')->required();
         $table->text('student_mobile')->required();
         $table->string('blood_group')->required();
         $table->string('gender')->required();
         $table->string('marital_status')->required();
         // parents info
         $table->text('father_name_bangla')->required();
         $table->text('father_name_english')->required();
         $table->text('mother_name_bangla')->required();
         $table->text('mother_name_english')->required();
         $table->text('father_mobile')->required();
         $table->text('mother_mobile')->required();
         $table->string('father_nid')->required();
         $table->string('mother_nid')->required();
         $table->text('father_birth_date')->required();
         $table->text('mother_birth_date')->required();

         // present address info
         $table->text('pres_division')->required();
         $table->text('pres_district')->required();
         $table->text('pres_upozilla')->required();
         $table->text('pres_city_corp')->required();
         $table->string('pres_post_code')->required();
         $table->longText('pres_address')->required();

         // permanent address info
         $table->text('perm_division')->required();
         $table->text('perm_district')->required();
         $table->text('perm_upozilla')->required();
         $table->text('perm_city_corp')->required();
         $table->string('perm_post_code')->required();
         $table->longText('perm_address')->required();

         // previous education info
         $table->text('pe_division')->required();
         $table->text('pe_district')->required();
         $table->text('pe_upozilla')->required();
         $table->text('pe_board')->required();
         $table->string('pe_passing_year')->required();
         $table->string('pe_roll')->required();
         $table->text('pe_institute')->required();
         $table->string('pe_gpa')->required();
         $table->text('pe_exam_name')->required();
         $table->text('pe_technology_trade')->required();
         $table->string('pe_att_rate')->required();

         // present education info
         $table->text('ce_division')->required();
         $table->text('ce_district')->required();
         $table->text('ce_upozilla')->required();
         $table->text('ce_institute_name')->required();
         $table->string('ce_semester')->required();
         $table->text('ce_technology_trade')->required();
         $table->string('ce_shift')->required();
         $table->text('ce_group')->required();
         $table->string('ce_roll')->required();
         $table->string('ce_reg')->required();

         // guardian info
         $table->text('guardian_name_bangla')->required();
         $table->text('guardian_name_english')->required();
         $table->text('guardian_mobile')->required();
         $table->string('guardian_nid')->required();
         $table->string('guardian_birth_date')->required();
         $table->string('relationship')->required();

         // condition info
         $table->string('cost_borne')->required();
         $table->string('disabilities')->required();
         $table->string('ethnic')->required();
         $table->string('ffq')->required();
         $table->string('scholarship')->required();

         // payment info
         $table->string('payment_method');
         $table->text('mobile_bank_provider')->nullable();
         $table->text('mobile_bank_account')->nullable();

         $table->text('bank_name')->nullable();
         $table->text('bank_branch')->nullable();
         $table->string('bank_acc_number')->nullable();
         $table->text('bank_acc_name')->nullable();
         $table->string('bank_acc_type')->nullable();
         $table->string('bank_routing')->nullable();


         // other info
         $table->text('formal_image_path')->required();
         $table->text('signature_image_path')->required();

         // responsive ID
         $table->char('responsive_id')->nullable();
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
