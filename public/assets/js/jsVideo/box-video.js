var fixedVideo = document.querySelector("[fixed-video]");

var fixedBox = document.querySelectorAll("[btn-video]");
var fixedEdit = document.querySelector("[btn-edit]");
var fixedDelete = document.querySelector("[btn-delete]");
var fixedExport = document.querySelector("[btn-export]");
var fixedMove = document.querySelector("[btn-move]");

var fixedVideoCard = document.querySelector("[fixed-video-card]");
var fixedVideoCloseButton = document.querySelectorAll("[fixed-video-close-button]");


fixedBox.forEach(function(element) {
  element.addEventListener("click", function () {
    fixedVideoCard.classList.toggle("opacity-0");
    fixedVideoCard.classList.toggle("opacity-1");
    fixedVideoCard.classList.toggle("hidden");
    fixedVideoCard.classList.toggle("block");
  });
});
fixedEdit.addEventListener("click", function () {
    $('#edit').toggle("hidden");
});
fixedDelete.addEventListener("click", function () {
    $('#delete').toggle("hidden");
});
fixedExport.addEventListener("click", function () {
    $('#export').toggle("hidden");
});
fixedMove.addEventListener("click", function () {
    $('#move').toggle("hidden");
});
fixedVideoCloseButton.forEach(function(element) {
  element.addEventListener("click", function () {
    fixedVideoCard.classList.toggle("opacity-0");
    fixedVideoCard.classList.toggle("opacity-1");
    fixedVideoCard.classList.toggle("hidden");
    fixedVideoCard.classList.toggle("block");
    $('#move,#edit,#delete,#export').css("display",'none')
  });
});

var check_all = document.querySelector("[checked-All]");
check_all.addEventListener("click", function () {
    var table = this.closest('table');
    var rows = table.querySelectorAll('.checkbox');
    if (this.checked === true) {
        rows.forEach(function (row) {
            row.checked = true;
        });
    } else {
        rows.forEach(function (row) {
            row.checked = false;
        });
    }
})
function searchFolder(input) {
    var valInput = $(input).val().toLowerCase()
    var folder = input.closest('[folder]')
    var itemFolders = folder.querySelectorAll('.item-folder');
    valInput === ''
        ? $(itemFolders).removeClass('hidden')
        : $(itemFolders).filter(function () {
            $(this).removeClass('hidden')
            var folder = $(this).find('h4').text().toLowerCase().indexOf(valInput)
            folder > 0 ? '' : $(this).addClass('hidden')
        })
}
$('.checkbox').click(function(){
    var table = this.closest('table');
    var rows = $(table).find('tbody .checkbox').length;
    var rows_checked = $(table).find('tbody .checkbox:checked').length;
    var checkBoxAll = $(table).find('[checked-All]');
    if (rows_checked > 0) {
        $('button[btn-video]').prop('disabled', false);
        $('button[btn-video]').removeClass('cursor-not-allowed')
        $('button[btn-video]').addClass('hover:text-green-500')
    } else {
        $('button[btn-video]').prop('disabled', true);
        $('button[btn-video]').addClass('cursor-not-allowed')
        $('button[btn-video]').removeClass('hover:text-green-500')
    }
    if (rows_checked < rows) {
        checkBoxAll.prop('checked', false);
    } else {
        checkBoxAll.prop('checked', true);
    }
});
