function markAsRead(url, userId, token) {
    $('.mark-article').click(function () {
        let currentElement = $(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                userId: userId,
                notificationId: currentElement.data('notification'),
                _token: token
            },
            success: function (data) {
                if (data.success) {
                    currentElement.parents('.notification-wrapper').hide('fade');
                }
            }
        });
    });
}
