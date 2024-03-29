<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formHandler extends Model
{
   use HasFactory;

   protected $fillable = [
      "student_name_bangla",
      "student_name_english",
      "birth_certificate_number",
      "birth_date",
      "student_mobile",
      "blood_group",
      "gender",
      "marital_status",
      "father_name_bangla",
      "father_name_english",
      "mother_name_bangla",
      "mother_name_english",
      "father_nid",
      "mother_nid",
      "father_birth_date",
      "mother_birth_date",
      "father_mobile",
      "mother_mobile",
      "pres_division",
      "pres_district",
      "pres_upozilla",
      "pres_city_corp",
      "pres_post_code",
      "pres_address",
      "perm_division",
      "perm_district",
      "perm_upozilla",
      "perm_city_corp",
      "perm_post_code",
      "perm_address",
      "pe_division",
      "pe_district",
      "pe_upozilla",
      "pe_board",
      "pe_institute",
      "pe_passing_year",
      "pe_gpa",
      "pe_exam_name",
      "pe_technology_trade",
      "pe_roll",
      "pe_att_rate",
      "ce_division",
      "ce_district",
      "ce_upozilla",
      "ce_institute_name",
      "ce_semester",
      "ce_technology_trade",
      "ce_session",
      "ce_shift",
      "ce_group",
      "ce_roll",
      "ce_reg",
      "relationship",
      "guardian_name_bangla",
      "guardian_name_english",
      "guardian_nid",
      "guardian_birth_date",
      "guardian_mobile",
      "cost_borne",
      "ethnic",
      "ffq",
      "scholarship",
      "disabilities",
      "payment_method",
      "mobile_bank_provider",
      "mobile_bank_account",
      "mobile_bank_account_holder",
      "mobile_bank_holder_nid",
      "bank_name",
      "bank_branch",
      "bank_routing",
      "bank_acc_type",
      "bank_acc_name",
      "bank_acc_number",
      "formal_image_path",
      "signature_image_path",
   ];

   protected $table = "form_handlers";

   // protected $primaryKey = "ce_reg";
}
