/**
 * DataTables Basic
 */


$(function () {
   "use strict";

   var dt_basic_table = $(".datatables-basic"),
      assetPath = "../../../app-assets/";

   var columns = new Array().sort();


   let select_column = document.getElementsByClassName('export_col');

   if ($("body").attr("data-framework") === "laravel") {
      assetPath = $("body").attr("data-asset-path");
   }


   // Filter column wise function
   function filterColumn(i, val) {
      if (i == 5) {
         var startDate = $('.start_date').val(),
            endDate = $('.end_date').val();
         if (startDate !== '' && endDate !== '') {
            filterByDate(i, startDate, endDate); // We call our filter function
         }

         $('.datatables-basic').dataTable().fnDraw();
      } else {
         $('.datatables-basic').DataTable().column(i).search(val, false, true).draw();
      }
   }


   // Advance filter function
   // We pass the column location, the start date, and the end date
   // var filterByDate = function (column, startDate, endDate) {
   //    // Custom filter syntax requires pushing the new filter to the global filter array
   //    $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
   //       var rowDate = normalizeDate(aData[column]),
   //          start = normalizeDate(startDate),
   //          end = normalizeDate(endDate);

   //       // If our date from the row is between the start and end
   //       if (start <= rowDate && rowDate <= end) {
   //          return true;
   //       } else if (rowDate >= start && end === '' && start !== '') {
   //          return true;
   //       } else if (rowDate <= end && start === '' && end !== '') {
   //          return true;
   //       } else {
   //          return false;
   //       }
   //    });
   // };

   // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
   // var normalizeDate = function (dateString) {
   //    var date = new Date(dateString);
   //    var normalized =
   //       date.getFullYear() + '' + ('0' + (date.getMonth() + 1)).slice(-2) + '' + ('0' + date.getDate()).slice(-2);
   //    return normalized;
   // };

   // DataTable with buttons
   // --------------------------------------------------------------------

   if (dt_basic_table.length) {
      dt_basic_table.DataTable({
         ajax: window.location.origin + "/authenticated/dash/api/applicant-list",
         columns: [
            { data: "responsive_id" },
            { data: "id" },
            { data: "id" }, // used for sorting so will hide this column
            { data: "student_name_english" },
            { data: "father_name_english" },
            { data: "mother_name_english" },
            { data: "ce_roll" },
            { data: "ce_reg" },
            { data: "ce_semester" },
            { data: "ce_technology_trade" },
            { data: "student_name_bangla" },
            { data: "birth_certificate_number" },
            { data: "birth_date" },
            { data: "student_mobile" },
            { data: "blood_group" },
            { data: "gender" },
            { data: "marital_status" },
            { data: "father_name_bangla" },
            { data: "mother_name_bangla" },
            { data: "father_mobile" },
            { data: "mother_mobile" },
            { data: "father_nid" },
            { data: "mother_nid" },
            { data: "father_birth_date" },
            { data: "mother_birth_date" },
            { data: "pres_division" },
            { data: "pres_district" },
            { data: "pres_upozilla" },
            { data: "pres_city_corp" },
            { data: "pres_post_code" },
            { data: "pres_address" },
            { data: "perm_division" },
            { data: "perm_district" },
            { data: "perm_upozilla" },
            { data: "perm_city_corp" },
            { data: "perm_post_code" },
            { data: "perm_address" },
            { data: "pe_division" },
            { data: "pe_district" },
            { data: "pe_upozilla" },
            { data: "pe_board" },
            { data: "pe_passing_year" },
            { data: "pe_roll" },
            { data: "pe_institute" },
            { data: "pe_gpa" },
            { data: "pe_exam_name" },
            { data: "pe_technology_trade" },
            { data: "pe_att_rate" },
            { data: "ce_division" },
            { data: "ce_district" },
            { data: "ce_upozilla" },
            { data: "ce_institute_name" },
            { data: "ce_semester" },
            { data: "ce_shift" },
            { data: "ce_group" },
            { data: "guardian_name_bangla" },
            { data: "guardian_name_english" },
            { data: "guardian_mobile" },
            { data: "guardian_nid" },
            { data: "guardian_birth_date" },
            { data: "relationship" },
            { data: "cost_borne" },
            { data: "disabilities" },
            { data: "ethnic" },
            { data: "ffq" },
            { data: "scholarship" },
            { data: "payment_method" },
            { data: "mobile_bank_provider" },
            { data: "mobile_bank_account" },
            { data: "bank_name" },
            { data: "bank_branch" },
            { data: "bank_acc_number" },
            { data: "bank_acc_name" },
            { data: "bank_acc_type" },
            { data: "bank_routing" },
            { data: "" },
         ],
         columnDefs: [
            {
               // For Responsive
               className: "control",
               orderable: false,
               responsivePriority: 2,
               targets: 0,
            },
            {
               targets: 2,
               visible: false,
            },
            {
               // Avatar image/badge, Name and post
               targets: 3,
               responsivePriority: 4,
               render: function (data, type, full, meta) {
                  var $user_img = full["formal_image_path"],
                     $name = full["student_name_english"],
                     $post = full["post"];
                  if ($user_img) {
                     // For Avatar image
                     var $output =
                        '<img src="' +
                        assetPath +
                        "student-images/formal-images/" +
                        $user_img +
                        '" alt="Avatar" width="32" height="32">';
                  } else {
                     // For Avatar badge
                     var stateNum = Math.floor(Math.random() * 7) + 1;
                     var states = [
                        "success",
                        "danger",
                        "warning",
                        "info",
                        "dark",
                        "primary",
                        "secondary",
                     ];
                     var $state = states[stateNum],
                        $name = full["student_name_english"],
                        $initials = $name.match(/\b\w/g) || [];
                     $initials = (
                        ($initials.shift() || "") + ($initials.pop() || "")
                     ).toUpperCase();
                     $output =
                        '<span class="avatar-content">' + $initials + "</span>";
                  }

                  var colorClass =
                     $user_img === "" ? " bg-light-" + $state + " " : "";
                  // Creates full output for row
                  var $row_output =
                     '<div class="d-flex justify-content-left align-items-center">' +
                     '<div class="avatar ' +
                     colorClass +
                     ' me-1">' +
                     $output +
                     "</div>" +
                     '<div class="d-flex flex-column">' +
                     '<span class="emp_name text-truncate fw-bold">' +
                     $name +
                     "</span>" +
                     // '<small class="emp_post text-truncate text-muted">' +
                     // $post +
                     // "</small>" +
                     "</div>" +
                     "</div>";
                  return $row_output;
               },
            },
            {
               // Actions
               targets: -1,
               title: "Actions",
               orderable: false,
               render: function (data, type, full, meta) {
                  return (
                     '<div class="d-inline-flex">' +
                     '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                     feather.icons["more-vertical"].toSvg({
                        class: "font-small-4",
                     }) +
                     "</a>" +
                     '<div class="dropdown-menu dropdown-menu-end">' +
                     '<a href="javascript:;" class="dropdown-item">' +
                     feather.icons["file-text"].toSvg({
                        class: "font-small-4 me-50",
                     }) +
                     "Details</a>" +

                     '<a href="javascript:;" class="dropdown-item delete-record">' +
                     feather.icons["trash-2"].toSvg({
                        class: "font-small-4 me-50",
                     }) +
                     "Delete</a>" +
                     "</div>" +
                     "</div>" +
                     '<a href="javascript:;" class="item-edit">' +
                     feather.icons["edit"].toSvg({ class: "font-small-4" }) +
                     "</a>"
                  );
               },
            },
         ],
         order: [[2, "desc"]],
         dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
         displayLength: 10,
         lengthMenu: [10, 25, 50, 75, 100, 200, 1000],
         buttons: [
            {
               extend: "collection",
               className: "btn btn-outline-secondary dropdown-toggle me-2",
               text:
                  feather.icons["share"].toSvg({
                     class: "font-small-4 me-50",
                  }) + "Export",
               buttons: [
                  {
                     extend: "print",
                     text:
                        feather.icons["printer"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Print",
                     className: "dropdown-item",
                     exportOptions: { columns },
                  },
                  {
                     extend: "csv",
                     text:
                        feather.icons["file-text"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Csv",
                     className: "dropdown-item",
                     exportOptions: { columns },
                  },
                  {
                     extend: "excel",
                     text:
                        feather.icons["file"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Excel",
                     className: "dropdown-item",
                     exportOptions: { columns },
                  },
                  {
                     extend: "pdf",
                     text:
                        feather.icons["clipboard"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Pdf",
                     className: "dropdown-item",
                     exportOptions: { columns },
                  },
                  {
                     extend: "copy",
                     text:
                        feather.icons["copy"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Copy",
                     className: "dropdown-item",
                     exportOptions: { columns },
                  },
               ],
               init: function (api, node, config) {
                  $(node).removeClass("btn-secondary");
                  $(node).parent().removeClass("btn-group");
                  setTimeout(function () {
                     $(node)
                        .closest(".dt-buttons")
                        .removeClass("btn-group")
                        .addClass("d-inline-flex");
                  }, 50);
               },
            },
            {
               text:
                  feather.icons["plus"].toSvg({ class: "me-50 font-small-4" }) +
                  "Add New",
               className: "create-new btn btn-primary",
               attr: {
                  id: "addNew",
               },
               init: function (api, node, config) {
                  $(node).removeClass("btn-secondary");
               },
            },
         ],
         responsive: {
            details: {
               display: $.fn.dataTable.Responsive.display.modal({
                  header: function (row) {
                     var data = row.data();
                     return "Details of " + data["student_name_english"];
                  },
               }),
               type: "column",
               renderer: function (api, rowIdx, columns) {
                  var data = $.map(columns, function (col, i) {

                     while (i <= 8) {
                        return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                           ? '<tr data-dt-row="' +
                           col.rowIdx +
                           '" data-dt-column="' +
                           col.columnIndex +
                           '">' +
                           "<td>" +
                           col.title +
                           ":" +
                           "</td> " +
                           "<td>" +
                           col.data +
                           "</td>" +
                           "</tr>"
                           : "";
                     }

                     if (col.columnIndex == 75) {
                        return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                           ? '<tr data-dt-row="' +
                           col.rowIdx +
                           '" data-dt-column="' +
                           col.columnIndex +
                           '">' +
                           "<td>" +
                           col.title +
                           ":" +
                           "</td> " +
                           "<td>" +
                           col.data +
                           "</td>" +
                           "</tr>"
                           : "";
                     }
                     if (col.columnIndex == 14) {
                        return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                           ? '<tr data-dt-row="' +
                           col.rowIdx +
                           '" data-dt-column="' +
                           col.columnIndex +
                           '">' +
                           "<td>" +
                           col.title +
                           ":" +
                           "</td> " +
                           "<td>" +
                           col.data +
                           "</td>" +
                           "</tr>"
                           : "";
                     }


                  }).join("");

                  return data
                     ? $('<table class="table"/>').append(
                        "<tbody>" + data + "</tbody>"
                     )
                     : false;
               },
            },
         },
         language: {
            paginate: {
               // remove previous & next text from pagination
               previous: "&nbsp;",
               next: "&nbsp;",
            },
         },
      });
      $("div.head-label").html('<h6 class="mb-0">Applicant List</h6>');
   }


   // on key up from input field
   $('input.dt-input').on('keyup', function () {
      filterColumn($(this).attr('data-column'), $(this).val());
   });
   $('select.dt-input').on('change', function () {
      filterColumn($(this).attr('data-column'), $(this).val());
   });


   // filter datatable column for Export / Expoer Options value
   function getCheckedValues() {
      for (let i = 0; i < select_column.length; i++) {
         if (select_column[i].checked) {
            if (!columns.includes(parseInt(select_column[i].value))) {
               columns.push(parseInt(select_column[i].value));
            }
         } else {
            if (columns.includes(parseInt(select_column[i].value))) {
               columns.splice(columns.indexOf(parseInt(select_column[i].value)), 1);
            }
         }
      }
   }
   document.getElementsByClassName('dt-button')[2].addEventListener('click', getCheckedValues);


   // Toggle Filter Options
   let showFilter = document.getElementById("showFilter");
   let filterForm = document.getElementById("filterForm");

   showFilter.addEventListener("click", function () {
      filterForm.classList.toggle("d-none");
      document.getElementById("filter").classList.toggle('border-bottom');
      document.getElementById("filter").classList.toggle('pb-0');
      if (filterForm.classList.contains("d-none")) {
         showFilter.innerHTML = "Show Filter";
      } else {
         showFilter.innerHTML = "Hide Filter";
      }
   });


   // Toggle Export Options
   let showExOp = document.getElementById("showExOp");
   let exOpForm = document.getElementById("exportForm");

   showExOp.addEventListener("click", function () {
      exOpForm.classList.toggle("d-none");
      document.getElementById("exportOption").classList.toggle('border-bottom');
      document.getElementById("exportOption").classList.toggle('pb-0');
      if (exOpForm.classList.contains("d-none")) {
         showExOp.innerHTML = "Show Options";
      } else {
         showExOp.innerHTML = "Hide Options";
      }
   });

   // toggle all checkboxes
   function selects() {
      for (var i = 0; i < select_column.length; i++) {
         if (select_column[i].type == 'checkbox')
            select_column[i].checked = true;
      }
   }
   function unselects() {
      for (var i = 0; i < select_column.length; i++) {
         if (select_column[i].type == 'checkbox')
            select_column[i].checked = false;
      }
   }

   document.getElementById('selectAll').addEventListener('click', selects);
   document.getElementById('unSelectAll').addEventListener('click', unselects);


   // append actions dropdown before add new button
   let addNew = document.getElementById("addNew");
   addNew.addEventListener("click", () => {
      window.open("http://localhost:8000/student-form", "_blank");
   });

});