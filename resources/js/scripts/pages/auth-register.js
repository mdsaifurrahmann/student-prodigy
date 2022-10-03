/*=========================================================================================
  File Name: auth-register.js
  Description: Auth register js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  ;('use strict')

  var pageResetForm = $('.auth-register-form'),
    select = $('.select2')
  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageResetForm.length) {
    pageResetForm.validate({
      /*
      * ? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },*/
      /*
      * ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, */
      rules: {
        'register-username': {
          required: true
        },
        'register-email': {
          required: true,
          email: true
        },
        'register-password': {
          required: true
        },
          'full-name': {
              required: true
          },
          'mobile-number': {
              required: true
          },
          'user-as': {
              required: true
          },
          'retype-password': {
              required: true
          },
          'register-privacy-policy':{
            required: true
          }


      }
    })
  }
})
