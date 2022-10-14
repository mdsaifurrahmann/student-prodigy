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
         'student-name-bangla'      => 'required',
         'student-name-english'     => 'required',
         'birth-certificate-number' => 'required',
         'birth-date'               => 'required',
         'student-mobile'           => 'required',
         'blood-group'              => 'required',
         'gender'                   => 'required',
         'marital-status'           => 'required',
         'father-name-bangla'       => 'required',
         'father-name-english'      => 'required',
         'mother-name-bangla'       => 'required',
         'mother-name-english'      => 'required',
         'father-nid'               => 'required',
         'mother-nid'               => 'required',
         'father-birth-date'        => 'required',
         'mother-birth-date'        => 'required',
         'father-mobile'            => 'required',
         'mother-mobile'            => 'required',
         'pres_division'            => 'required',
         'pres_district'            => 'required',
         'pres_upozilla'            => 'required',
         'pres-city-corp'           => 'required',
         'pres-post-code'           => 'required',
         'pres-address'             => 'required',
         'perm_division'            => 'required',
         'perm_district'            => 'required',
         'perm_upozilla'            => 'required',
         'perm-city-corp'           => 'required',
         'perm-post-code'           => 'required',
         'perm-address'             => 'required',
         'pe_division'              => 'required',
         'pe_district'              => 'required',
         'pe_upozilla'              => 'required',
         'pe-board'                 => 'required',
         'pe-institute'             => 'required',
         'pe-passing-year'          => 'required',
         'pe-gpa'                   => 'required',
         'pe-exam-name'             => 'required',
         'pe-technology-trade'      => 'required',
         'pe-roll'                  => 'required',
         'pe-att-rate'              => 'required',
         'ce_division'              => 'required',
         'ce_district'              => 'required',
         'ce_upozilla'              => 'required',
         'ce-institute-name'        => 'required',
         'ce-semester'              => 'required',
         'ce-technology-trade'      => 'required',
         'ce-shift'                 => 'required',
         'ce-group'                 => 'required',
         'ce-roll'                  => 'required',
         'ce-reg'                   => 'required',
         'relationship'             => 'required',
         'guardian-name-bangla'     => 'required',
         'guardian-name-english'    => 'required',
         'guardian-nid'             => 'required',
         'guardian-birth-date'      => 'required',
         'guardian-mobile'          => 'required',
         'cost-borne'               => 'required',
         'ethnic'                   => 'required',
         'ffq'                      => 'required',
         'scholarship'              => 'required',
         'disabilities'             => 'required',
         'payment-method'           => 'required',
         'mobile-bank-provider'     => 'exclude_if:payment-method,==,banking|required',
         'mobile-bank-account'      => 'exclude_if:payment-method,==,banking|required',
         'bank-name'                => 'exclude_if:payment-method,==,mobile-banking|required',
         'bank-branch'              => 'exclude_if:payment-method,==,mobile-banking|required',
         'bank-routing'             => 'exclude_if:payment-method,==,mobile-banking|required',
         'bank-acc-type'            => 'exclude_if:payment-method,==,mobile-banking|required',
         'bank-acc-name'            => 'exclude_if:payment-method,==,mobile-banking|required',
         'bank-acc-number'          => 'exclude_if:payment-method,==,mobile-banking|required',
         'formal_image'             => 'required|mimes:jpg,png,jpeg|max:512',
         'signature_image'          => 'required|mimes:jpeg,png,jpg|max:512',
      ];
   }

   public function messages()
   {
      return [
         'student-name-bangla.required'      => 'Please enter your name in Bangla',
         'student-name-english.required'     => 'Please enter your name in English',
         'birth-certificate-number.required' => 'Please enter your birth certificate number',
         'birth-date.required'               => 'Please enter your birth date',
         'student-mobile.required'           => 'Please enter your mobile number',
         'blood-group.required'              => 'Please select your blood group',
         'gender.required'                   => 'Please select gender',
         'marital-status.required'           => 'Please select marital status',
         'father-name-bangla.required'       => 'Please enter your father\'s name in Bangla',
         'father-name-english.required'      => 'Please enter your father\'s name in English',
         'mother-name-bangla.required'       => 'Please enter your mother\'s name in Bangla',
         'mother-name-english.required'      => 'Please enter your mother\'s name in English',
         'father-nid.required'               => 'Please enter your father\'s NID',
         'mother-nid.required'               => 'Please enter your mother\'s NID',
         'father-birth-date.required'        => 'Please enter your father\'s birth date',
         'mother-birth-date.required'        => 'Please enter your mother\'s birth date',
         'father-mobile.required'            => 'Please enter your father\'s mobile number',
         'mother-mobile.required'            => 'Please enter your mother\'s mobile number',
         'pres_division.required'            => 'Please select your present division',
         'pres_district.required'            => 'Please select your present district',
         'pres_upozilla.required'            => 'Please select your present upozilla',
         'pres-city-corp.required'           => 'Please Enter your present Union/City corporation',
         'pres-post-code.required'           => 'Please enter your present post code',
         'pres-address.required'             => 'Please enter your present address',
         'perm_division.required'            => 'Please select your permanent division',
         'perm_district.required'            => 'Please select your permanent district',
         'perm_upozilla.required'            => 'Please select your permanent upozilla',
         'perm-city-corp.required'           => 'Please Enter your permanent Union/City corporation',
         'perm-post-code.required'           => 'Please enter your permanent post code',
         'perm-address.required'             => 'Please enter your permanent address',
         'pe_division.required'              => 'Please select your previous institute division',
         'pe_district.required'              => 'Please select your previous institute district',
         'pe_upozilla.required'              => 'Please select your previous institute upozilla',
         'pe-board.required'                 => 'Please select your previous institute board',
         'pe-institute.required'             => 'Please enter your previous institute name',
         'pe-passing-year.required'          => 'Please enter passing year',
         'pe-gpa.required'                   => 'Please enter your GPA',
         'pe-exam-name.required'             => 'Please enter your previous exam name',
         'pe-technology-trade.required'      => 'Please enter your previous technology/trade',
         'pe-roll.required'                  => 'Please enter your previous roll',
         'pe-att-rate.required'              => 'Please enter your previous attendance rate',
         'ce_division.required'              => 'Please select your current institute division',
         'ce_district.required'              => 'Please select your current institute district',
         'ce_upozilla.required'              => 'Please select your current institute upozilla',
         'ce-institute-name.required'        => 'Please enter your current institute name',
         'ce-semester.required'              => 'Please select your current semester',
         'ce-technology-trade.required'      => 'Please enter your current technology/trade',
         'ce-shift.required'                 => 'Please select your shift',
         'ce-group.required'                 => 'Please select your group',
         'ce-roll.required'                  => 'Please enter your current roll',
         'ce-reg.required'                   => 'Please enter your current registration number',
         'relationship.required'             => 'Please select your relationship with guardian',
         'guardian-name-bangla.required'     => 'Please enter your guardian\'s name in Bangla',
         'guardian-name-english.required'    => 'Please enter your guardian\'s name in English',
         'guardian-nid.required'             => 'Please enter your guardian\'s NID',
         'guardian-birth-date.required'      => 'Please enter your guardian\'s birth date',
         'guardian-mobile.required'          => 'Please enter your guardian\'s mobile number',
         'cost-borne.required'               => 'Please select who will borne your educational cost',
         'ethnic.required'                   => 'Please select your ethnic group',
         'ffq.required'                      => 'Please select your Freedom Figher Quota status',
         'scholarship.required'              => 'Please select your scholarship status',
         'disabilities.required'             => 'Please select your disabilities status',
         'payment-method.required'           => 'Please select your payment method',
         'mobile-bank-provider.required'     => 'Please select your mobile banking provider',
         'mobile-bank-account.required'      => 'Please enter your mobile banking account number',
         'bank-name.required'                => 'Please enter your bank name',
         'bank-branch.required'              => 'Please enter your bank branch',
         'bank-routing.required'             => 'Please enter your bank routing number',
         'bank-acc-type.required'            => 'Please select your bank account type',
         'bank-acc-name.required'            => 'Please enter your bank account name',
         'bank-acc-number.required'          => 'Please enter your bank account number',

         'formal_image.required' => 'This field is required! Please upload your formal image',
         'signature_image.required'    => 'This field is required! Please upload your signature image.',

         'formal_image.max' => 'The max upload size is 512KB. Please upload <= 512KB image.',
         'signature_image.max'    => 'The max upload size is 512KB. Please upload <= 512KB image.',

         'formal_image.mimes' => 'Only jpeg, png, jpg images are allowed to upload.',
         'signature_image.mimes'    => 'Only jpeg, png, jpg images are allowed to upload.',
      ];
   }
}
