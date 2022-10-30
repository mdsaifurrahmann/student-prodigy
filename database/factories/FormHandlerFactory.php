<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\formHandler>
 */
class FormHandlerFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition()
   {
      return [
         "student_name_bangla" => $this->faker->name,
         "student_name_english" => $this->faker->name,
         "birth_certificate_number" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "birth_date" => $this->faker->date(),
         "student_mobile" => $this->faker->phoneNumber,
         "blood_group" => $this->faker->word,
         "gender" => $this->faker->word,
         "marital_status" => $this->faker->word,
         "father_name_bangla" => $this->faker->name,
         "father_name_english" => $this->faker->name,
         "mother_name_bangla" => $this->faker->name,
         "mother_name_english" =>  $this->faker->name,
         "father_nid" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "mother_nid" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "father_birth_date" => $this->faker->date(),
         "mother_birth_date" => $this->faker->date(),
         "father_mobile" => $this->faker->phoneNumber,
         "mother_mobile" => $this->faker->phoneNumber,
         "pres_division" => $this->faker->city,
         "pres_district" => $this->faker->state,
         "pres_upozilla" => $this->faker->streetName,
         "pres_city_corp" => $this->faker->streetSuffix,
         "pres_post_code" => $this->faker->postcode,
         "pres_address" => $this->faker->address,
         "perm_division" => $this->faker->city,
         "perm_district" => $this->faker->state,
         "perm_upozilla" => $this->faker->streetName,
         "perm_city_corp" => $this->faker->streetSuffix,
         "perm_post_code" => $this->faker->postcode,
         "perm_address" => $this->faker->address,
         "pe_division" => $this->faker->city,
         "pe_district" => $this->faker->state,
         "pe_upozilla" => $this->faker->streetName,
         "pe_board" => $this->faker->word,
         "pe_institute" => $this->faker->word,
         "pe_passing_year" => $this->faker->year,
         "pe_gpa" => $this->faker->randomFloat(2, 0, 4),
         "pe_exam_name" => $this->faker->word,
         "pe_technology_trade" => $this->faker->word,
         "pe_roll" => $this->faker->randomNumber(6),
         "pe_att_rate" => $this->faker->randomFloat(2, 0, 100),
         "ce_division" => $this->faker->city,
         "ce_district" => $this->faker->state,
         "ce_upozilla" => $this->faker->streetName,
         "ce_institute_name" => $this->faker->word,
         "ce_semester" => $this->faker->word,
         "ce_technology_trade" => $this->faker->word,
         "ce_shift" => $this->faker->word,
         "ce_group" => $this->faker->word,
         "ce_roll" => $this->faker->randomNumber(6),
         "ce_reg" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "relationship" => $this->faker->word,
         "guardian_name_bangla" => $this->faker->name,
         "guardian_name_english" => $this->faker->name,
         "guardian_nid" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "guardian_birth_date" => $this->faker->date(),
         "guardian_mobile" => $this->faker->phoneNumber,
         "cost_borne" => $this->faker->word,
         "ethnic" => $this->faker->boolean,
         "ffq" => $this->faker->boolean,
         "scholarship" => $this->faker->boolean,
         "disabilities" => $this->faker->boolean,
         "payment_method" => $this->faker->word,
         "mobile_bank_provider" => $this->faker->word,
         "mobile_bank_account" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "bank_name" => $this->faker->word,
         "bank_branch" => $this->faker->word,
         "bank_routing" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "bank_acc_type" => $this->faker->word,
         "bank_acc_name" => $this->faker->word,
         "bank_acc_number" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "formal_photo" => $this->faker->imageUrl($width = 640, $height = 480),
         "signature" => $this->faker->imageUrl($width = 640, $height = 480)
      ];
   }
}
