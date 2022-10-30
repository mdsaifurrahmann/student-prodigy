<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreformHandlerRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, mixed>
    */
   public function rules()
   {
      return [
         'student_name_bangla'      => 'required',
         'student_name_english'     => 'required',
         'birth_certificate_number' => 'required',
         'birth_date'               => 'required',
         'student_mobile'           => 'required',
         'blood_group'              => 'required',
         'gender'                   => 'required',
         'marital_status'           => 'required',
         'father_name_bangla'       => 'required',
         'father_name_english'      => 'required',
         'mother_name_bangla'       => 'required',
         'mother_name_english'      => 'required',
         'father_nid'               => 'required',
         'mother_nid'               => 'required',
         'father_birth_date'        => 'required',
         'mother_birth_date'        => 'required',
         'father_mobile'            => 'required',
         'mother_mobile'            => 'required',
         'pres_division'            => 'required',
         'pres_district'            => 'required',
         'pres_upozilla'            => 'required',
         'pres_city_corp'           => 'required',
         'pres_post_code'           => 'required',
         'pres_address'             => 'required',
         'perm_division'            => 'required',
         'perm_district'            => 'required',
         'perm_upozilla'            => 'required',
         'perm_city_corp'           => 'required',
         'perm_post_code'           => 'required',
         'perm_address'             => 'required',
         'pe_division'              => 'required',
         'pe_district'              => 'required',
         'pe_upozilla'              => 'required',
         'pe_board'                 => 'required',
         'pe_institute'             => 'required',
         'pe_passing_year'          => 'required',
         'pe_gpa'                   => 'required',
         'pe_exam_name'             => 'required',
         'pe_technology_trade'      => 'required',
         'pe_roll'                  => 'required',
         'pe_att_rate'              => 'required',
         'ce_division'              => 'required',
         'ce_district'              => 'required',
         'ce_upozilla'              => 'required',
         'ce_institute_name'        => 'required',
         'ce_semester'              => 'required',
         'ce_technology_trade'      => 'required',
         'ce_shift'                 => 'required',
         'ce_group'                 => 'required',
         'ce_roll'                  => 'required',
         'ce_reg'                   => 'required',
         'relationship'             => 'required',
         'guardian_name_bangla'     => 'required',
         'guardian_name_english'    => 'required',
         'guardian_nid'             => 'required',
         'guardian_birth_date'      => 'required',
         'guardian_mobile'          => 'required',
         'cost_borne'               => 'required',
         'ethnic'                   => 'required',
         'ffq'                      => 'required',
         'scholarship'              => 'required',
         'disabilities'             => 'required',
         'payment_method'           => 'required',
         'mobile_bank_provider'     => 'exclude_if:payment_method,==,banking|required',
         'mobile_bank_account'      => 'exclude_if:payment_method,==,banking|required',
         'bank_name'                => 'exclude_if:payment_method,==,mobile_banking|required',
         'bank_branch'              => 'exclude_if:payment_method,==,mobile_banking|required',
         'bank_routing'             => 'exclude_if:payment_method,==,mobile_banking|required',
         'bank_acc_type'            => 'exclude_if:payment_method,==,mobile_banking|required',
         'bank_acc_name'            => 'exclude_if:payment_method,==,mobile_banking|required',
         'bank_acc_number'          => 'exclude_if:payment_method,==,mobile_banking|required',
         'formal_image'             => 'required|mimes:jpg,png,jpeg|max:512',
         'signature_image'          => 'required|mimes:jpeg,png,jpg|max:512',
      ];
   }

   public function messages()
   {
      return [
         'student_name_bangla.required'      => 'Please enter your name in Bangla',
         'student_name_english.required'     => 'Please enter your name in English',
         'birth_certificate_number.required' => 'Please enter your birth certificate number',
         'birth_date.required'               => 'Please enter your birth date',
         'student_mobile.required'           => 'Please enter your mobile number',
         'blood_group.required'              => 'Please select your blood group',
         'gender.required'                   => 'Please select gender',
         'marital_status.required'           => 'Please select marital status',
         'father_name_bangla.required'       => 'Please enter your father\'s name in Bangla',
         'father_name_english.required'      => 'Please enter your father\'s name in English',
         'mother_name_bangla.required'       => 'Please enter your mother\'s name in Bangla',
         'mother_name_english.required'      => 'Please enter your mother\'s name in English',
         'father_nid.required'               => 'Please enter your father\'s NID',
         'mother_nid.required'               => 'Please enter your mother\'s NID',
         'father_birth_date.required'        => 'Please enter your father\'s birth date',
         'mother_birth_date.required'        => 'Please enter your mother\'s birth date',
         'father_mobile.required'            => 'Please enter your father\'s mobile number',
         'mother_mobile.required'            => 'Please enter your mother\'s mobile number',
         'pres_division.required'            => 'Please select your present division',
         'pres_district.required'            => 'Please select your present district',
         'pres_upozilla.required'            => 'Please select your present upozilla',
         'pres_city_corp.required'           => 'Please Enter your present Union/City corporation',
         'pres_post_code.required'           => 'Please enter your present post code',
         'pres_address.required'             => 'Please enter your present address',
         'perm_division.required'            => 'Please select your permanent division',
         'perm_district.required'            => 'Please select your permanent district',
         'perm_upozilla.required'            => 'Please select your permanent upozilla',
         'perm_city_corp.required'           => 'Please Enter your permanent Union/City corporation',
         'perm_post_code.required'           => 'Please enter your permanent post code',
         'perm_address.required'             => 'Please enter your permanent address',
         'pe_division.required'              => 'Please select your previous institute division',
         'pe_district.required'              => 'Please select your previous institute district',
         'pe_upozilla.required'              => 'Please select your previous institute upozilla',
         'pe_board.required'                 => 'Please select your previous institute board',
         'pe_institute.required'             => 'Please enter your previous institute name',
         'pe_passing_year.required'          => 'Please enter passing year',
         'pe_gpa.required'                   => 'Please enter your GPA',
         'pe_exam_name.required'             => 'Please enter your previous exam name',
         'pe_technology_trade.required'      => 'Please enter your previous technology/trade',
         'pe_roll.required'                  => 'Please enter your previous roll',
         'pe_att_rate.required'              => 'Please enter your previous attendance rate',
         'ce_division.required'              => 'Please select your current institute division',
         'ce_district.required'              => 'Please select your current institute district',
         'ce_upozilla.required'              => 'Please select your current institute upozilla',
         'ce_institute_name.required'        => 'Please enter your current institute name',
         'ce_semester.required'              => 'Please select your current semester',
         'ce_technology_trade.required'      => 'Please enter your current technology/trade',
         'ce_shift.required'                 => 'Please select your shift',
         'ce_group.required'                 => 'Please select your group',
         'ce_roll.required'                  => 'Please enter your current roll',
         'ce_reg.required'                   => 'Please enter your current registration number',
         'relationship.required'             => 'Please select your relationship with guardian',
         'guardian_name_bangla.required'     => 'Please enter your guardian\'s name in Bangla',
         'guardian_name_english.required'    => 'Please enter your guardian\'s name in English',
         'guardian_nid.required'             => 'Please enter your guardian\'s NID',
         'guardian_birth_date.required'      => 'Please enter your guardian\'s birth date',
         'guardian_mobile.required'          => 'Please enter your guardian\'s mobile number',
         'cost_borne.required'               => 'Please select who will borne your educational cost',
         'ethnic.required'                   => 'Please select your ethnic group',
         'ffq.required'                      => 'Please select your Freedom Figher Quota status',
         'scholarship.required'              => 'Please select your scholarship status',
         'disabilities.required'             => 'Please select your disabilities status',
         'payment_method.required'           => 'Please select your payment method',
         'mobile_bank_provider.required'     => 'Please select your mobile banking provider',
         'mobile_bank_account.required'      => 'Please enter your mobile banking account number',
         'bank_name.required'                => 'Please enter your bank name',
         'bank_branch.required'              => 'Please enter your bank branch',
         'bank_routing.required'             => 'Please enter your bank routing number',
         'bank_acc_type.required'            => 'Please select your bank account type',
         'bank_acc_name.required'            => 'Please enter your bank account name',
         'bank_acc_number.required'          => 'Please enter your bank account number',

         'formal_image.required' => 'This field is required! Please upload your formal image',
         'signature_image.required'    => 'This field is required! Please upload your signature image.',

         'formal_image.max' => 'The max upload size is 512KB. Please upload <= 512KB image.',
         'signature_image.max'    => 'The max upload size is 512KB. Please upload <= 512KB image.',

         'formal_image.mimes' => 'Only jpeg, png, jpg images are allowed to upload.',
         'signature_image.mimes'    => 'Only jpeg, png, jpg images are allowed to upload.',
      ];
   }
}
