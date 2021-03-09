$('.users_table').find('a').click(function (event) {
        $q = $(this).attr('href');
        if (!$q.indexOf('?deluser')) {
            event.preventDefault();
            $url = "index.php" + $q;
            if (confirm('Вы собираетесь удалить пользователя. Подтвердите действие.')) {
                $.ajax({
                    url: $url,
                    beforeSend: function () {
                        $('.wait-bar').addClass('add_bg');
                    },
                    error: function () {
                        alert('AJAX ERROR');
                    },
                    success: function (data) {
                        $('.wait-bar').removeClass('add_bg');
                        $('body').html(data);
                    }
                });
            }
        } else {
            console.log('red');
        }
    })