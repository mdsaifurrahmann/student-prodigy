/**
 * DataTables Basic
 */

$(function () {
   "use strict";

   var dt_basic_table = $(".datatables-basic"),
      assetPath = "../../../app-assets/";

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
   var filterByDate = function (column, startDate, endDate) {
      // Custom filter syntax requires pushing the new filter to the global filter array
      $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
         var rowDate = normalizeDate(aData[column]),
            start = normalizeDate(startDate),
            end = normalizeDate(endDate);

         // If our date from the row is between the start and end
         if (start <= rowDate && rowDate <= end) {
            return true;
         } else if (rowDate >= start && end === '' && start !== '') {
            return true;
         } else if (rowDate <= end && start === '' && end !== '') {
            return true;
         } else {
            return false;
         }
      });
   };

   // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
   var normalizeDate = function (dateString) {
      var date = new Date(dateString);
      var normalized =
         date.getFullYear() + '' + ('0' + (date.getMonth() + 1)).slice(-2) + '' + ('0' + date.getDate()).slice(-2);
      return normalized;
   };

   // DataTable with buttons
   // --------------------------------------------------------------------

   if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
         ajax: assetPath + "data/table-datatable.json",
         columns: [
            { data: "responsive_id" },
            { data: "id" },
            { data: "id" }, // used for sorting so will hide this column
            { data: "full_name" },
            { data: "email" },
            { data: "start_date" },
            { data: "salary" },
            { data: "" },
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
                  var $user_img = full["avatar"],
                     $name = full["full_name"],
                     $post = full["post"];
                  if ($user_img) {
                     // For Avatar image
                     var $output =
                        '<img src="' +
                        assetPath +
                        "images/avatars/" +
                        $user_img +
                        '" alt="Avatar" width="32" height="32">';
                  } else {
                     // For Avatar badge
                     var stateNum = full["status"];
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
                        $name = full["full_name"],
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
                     '<small class="emp_post text-truncate text-muted">' +
                     $post +
                     "</small>" +
                     "</div>" +
                     "</div>";
                  return $row_output;
               },
            },
            {
               responsivePriority: 1,
               targets: 4,
            },
            {
               // Label
               targets: -2,
               render: function (data, type, full, meta) {
                  var $status_number = full["status"];
                  var $status = {
                     1: { title: "Current", class: "badge-light-primary" },
                     2: {
                        title: "Professional",
                        class: " badge-light-success",
                     },
                     3: { title: "Rejected", class: " badge-light-danger" },
                     4: { title: "Resigned", class: " badge-light-warning" },
                     5: { title: "Applied", class: " badge-light-info" },
                  };
                  if (typeof $status[$status_number] === "undefined") {
                     return data;
                  }
                  return (
                     '<span class="badge rounded-pill ' +
                     $status[$status_number].class +
                     '">' +
                     $status[$status_number].title +
                     "</span>"
                  );
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
                     '<a href="{{route("register"}}" class="dropdown-item">' +
                     feather.icons["archive"].toSvg({
                        class: "font-small-4 me-50",
                     }) +
                     "Archive</a>" +
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
         lengthMenu: [10, 25, 50, 75, 100],
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
                     exportOptions: { columns: [3, 4, 5, 6, 7] },
                  },
                  {
                     extend: "csv",
                     text:
                        feather.icons["file-text"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Csv",
                     className: "dropdown-item",
                     exportOptions: { columns: [3, 4, 5, 6, 7] },
                  },
                  {
                     extend: "excel",
                     text:
                        feather.icons["file"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Excel",
                     className: "dropdown-item",
                     exportOptions: { columns: [3, 4, 5, 6, 7] },
                  },
                  {
                     extend: "pdf",
                     text:
                        feather.icons["clipboard"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Pdf",
                     className: "dropdown-item",
                     exportOptions: { columns: [3, 4, 5, 6, 7] },
                  },
                  {
                     extend: "copy",
                     text:
                        feather.icons["copy"].toSvg({
                           class: "font-small-4 me-50",
                        }) + "Copy",
                     className: "dropdown-item",
                     exportOptions: { columns: [3, 4, 5, 6, 7] },
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
                  "data-bs-toggle": "modal",
                  "data-bs-target": "#modals-slide-in",
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
                     return "Details of " + data["full_name"];
                  },
               }),
               type: "column",
               renderer: function (api, rowIdx, columns) {
                  var data = $.map(columns, function (col, i) {
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

   // To append actions dropdown before add new button
   let addNew = document.getElementById("addNew");

   addNew.addEventListener("click", function () {
      // location.href = "//localhost:8000/student-form";
      window.open("//localhost:8000/student-form", "_blank");
   });

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
});