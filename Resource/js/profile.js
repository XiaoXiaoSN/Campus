$('.ui.sticky')
  .sticky({
    offset       : 50,
    bottomOffset : 50,
    context      : '#main1'
  })
;
$('.ui.dropdown')
  .dropdown({
    allowAdditions: true
  })
;
$('#multi-select')
  .dropdown({
    allowAdditions: true
  })
;

$('.small.modal.edit').modal({
    onVisible: function() {
        setTimeout(function() {
            $(".flatpickr").removeAttr("disabled");
        }, 1);
    },
    onHide: function(){
        $(".flatpickr").attr("disabled", "disabled");
    }
});
