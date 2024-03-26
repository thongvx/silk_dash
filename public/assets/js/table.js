$(function () {
    "use strict";
	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : false,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
    "scrollY": "calc(100vh - 21.5em)", // Chiều cao cố định của bảng
    "scrollCollapse": true,
    fixedHeader: true,
    scrollX: true,
    stripeClasses: ['odd', 'even']
	});
  });