<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @foreach($notifications as $notification)
        <div class="notification-wrapper">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #ceffbc !important;">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="user-article-notification">
                            <span>The new article <a href="{{$notification->data['article_link']}}">{{ $notification->data['article_name'] }}</a> has been created.</span>
                        </div>
                        <div class="mark-article-wrapper">
                            <a href="#" class="mark-article" data-notification="{{$notification->id}}">Mark as read</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function() {
            $('.mark-article').click(function () {
                let currentElement = $(this);

                $.ajax({
                    url: "{{route('dashboard.mark_article')}}",
                    method: 'POST',
                    data: {
                        userId: {{auth()->id()}},
                        notificationId: currentElement.data('notification'),
                        _token: "{{csrf_token()}}"
                    },
                    success: function (data) {
                        if (data.success) {
                            currentElement.parents('.notification-wrapper').hide('fade');
                        }
                    }
                });
            });
        });
    </script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
