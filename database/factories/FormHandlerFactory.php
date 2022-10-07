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
         "student-name-bangla" => $this->faker->name,
         "student-name-english" => $this->faker->name,
         "birth-certificate-number" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "birth-date" => $this->faker->date(),
         "student-mobile" => $this->faker->phoneNumber,
         "blood-group" => $this->faker->word,
         "gender" => $this->faker->word,
         "marital-status" => $this->faker->word,
         "father-name-bangla" => $this->faker->name,
         "father-name-english" => $this->faker->name,
         "mother-name-bangla" => $this->faker->name,
         "mother-name-english" =>  $this->faker->name,
         "father-nid" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "mother-nid" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "father-birth-date" => $this->faker->date(),
         "mother-birth-date" => $this->faker->date(),
         "father-mobile" => $this->faker->phoneNumber,
         "mother-mobile" => $this->faker->phoneNumber,
         "pres_division" => $this->faker->city,
         "pres_district" => $this->faker->state,
         "pres_upozilla" => $this->faker->streetName,
         "pres-city-corp" => $this->faker->streetSuffix,
         "pres-post-code" => $this->faker->postcode,
         "pres-address" => $this->faker->address,
         "perm_division" => $this->faker->city,
         "perm_district" => $this->faker->state,
         "perm_upozilla" => $this->faker->streetName,
         "perm-city-corp" => $this->faker->streetSuffix,
         "perm-post-code" => $this->faker->postcode,
         "perm-address" => $this->faker->address,
         "pe_division" => $this->faker->city,
         "pe_district" => $this->faker->state,
         "pe_upozilla" => $this->faker->streetName,
         "pe-board" => $this->faker->word,
         "pe-institute" => $this->faker->word,
         "pe-passing-year" => $this->faker->year,
         "pe-gpa" => $this->faker->randomFloat(2, 0, 4),
         "pe-exam-name" => $this->faker->word,
         "pe-technology-trade" => $this->faker->word,
         "pe-roll" => $this->faker->randomNumber(6),
         "pe-att-rate" => $this->faker->randomFloat(2, 0, 100),
         "ce_division" => $this->faker->city,
         "ce_district" => $this->faker->state,
         "ce_upozilla" => $this->faker->streetName,
         "ce-institute-name" => $this->faker->word,
         "ce-semester" => $this->faker->word,
         "ce-technology-trade" => $this->faker->word,
         "ce-shift" => $this->faker->word,
         "ce-group" => $this->faker->word,
         "ce-roll" => $this->faker->randomNumber(6),
         "ce-reg" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "relationship" => $this->faker->word,
         "guardian-name-bangla" => $this->faker->name,
         "guardian-name-english" => $this->faker->name,
         "guardian-nid" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "guardian-birth-date" => $this->faker->date(),
         "guardian-mobile" => $this->faker->phoneNumber,
         "cost-borne" => $this->faker->word,
         "ethnic" => $this->faker->boolean,
         "ffq" => $this->faker->boolean,
         "scholarship" => $this->faker->boolean,
         "disabilities" => $this->faker->boolean,
         "payment-method" => $this->faker->word,
         "mobile-bank-provider" => $this->faker->word,
         "mobile-bank-account" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "bank-name" => $this->faker->word,
         "bank-branch" => $this->faker->word,
         "bank-routing" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "bank-acc-type" => $this->faker->word,
         "bank-acc-name" => $this->faker->word,
         "bank-acc-number" => $this->faker->numberBetween(1000000000000, 9999999999999),
         "formal-photo" => $this->faker->imageUrl($width = 640, $height = 480),
         "signature" => $this->faker->imageUrl($width = 640, $height = 480)
      ];
   }
}
