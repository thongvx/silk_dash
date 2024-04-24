var fixedPayoutCard = document.querySelector("[fixed-payout-card]");
var fixedVideoCloseButton = document.querySelectorAll("[fixed-payout-close-button]");
function fixedBox () {
    fixedPayoutCard.classList.toggle("opacity-0");
    fixedPayoutCard.classList.toggle("opacity-1");
    fixedPayoutCard.classList.toggle("hidden");
    fixedPayoutCard.classList.toggle("block");
}
$(document).on('click', '.button-payout', function() {
    fixedBox()
});
fixedVideoCloseButton.forEach(function(element) {
    element.addEventListener("click", function () {
        fixedBox ()
    });
});
