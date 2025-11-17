import './bootstrap';
import Echo from 'laravel-echo';

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: false,
    enabledTransports: ['ws'],
});

window.Echo.channel('chat')
    .listen('.message.posted', (e) => {
        const div = document.getElementById('messages');
        div.innerHTML += `<p><b>${e.user}:</b> ${e.content}</p>`;
    });
