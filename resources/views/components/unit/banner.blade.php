<div x-data="{ show: false, message: '' }" x-show.fade="show" style="display: none;" x-init="document.addEventListener('banner-message', event => {
    message = event.detail.message;
    show = true;

    setTimeout(() => {
        message = '',
            show = false
    }, 5500);
});" id="flash-message"
    class="bg-indigo-500 py-3 px-5 font-semibold rounded-sm shadow mb-4 block mt-1 text-white" x-text="message"
    x-transition.opacity>
</div>
