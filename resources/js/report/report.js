var fixedPayoutCard = $("[fixed-payout-card]");
var fixedVideoCloseButton = $("[fixed-payout-close-button]");
function fixedBox () {
    fixedPayoutCard.toggleClass("opacity-0");
    fixedPayoutCard.toggleClass("opacity-1");
    fixedPayoutCard.toggleClass("hidden");
    fixedPayoutCard.toggleClass("block");
}
$(document).on('click', '.button-payout', function() {
    fixedBox()
});
fixedVideoCloseButton.on("click", function () {
    fixedBox ()
});
