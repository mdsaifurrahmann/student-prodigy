// Toggle Export Options
let showOp = document.getElementById("showOp");
let hideItem = document.getElementById("hideItem");

showOp.addEventListener("click", function () {
    hideItem.classList.toggle("d-none");
    document.getElementById("hideOption").classList.toggle('border-bottom');
    document.getElementById("hideOption").classList.toggle('pb-0');
    if (hideItem.classList.contains("d-none")) {
        showOp.innerHTML = "Show Options";
    } else {
        showOp.innerHTML = "Hide Options";
    }
});

// toggle all checkboxes
let select_column = document.getElementsByClassName('hide_col');
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