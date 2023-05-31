/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/js/view/dashboard-article-notify.js ***!
  \*******************************************************/
function markAsRead(url, userId, token) {
  $('.mark-article').click(function () {
    var currentElement = $(this);
    $.ajax({
      url: url,
      method: 'POST',
      data: {
        userId: userId,
        notificationId: currentElement.data('notification'),
        _token: token
      },
      success: function success(data) {
        if (data.success) {
          currentElement.parents('.notification-wrapper').hide('fade');
        }
      }
    });
  });
}
/******/ })()
;