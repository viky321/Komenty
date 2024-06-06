import { createApp } from 'vue';
import './bootstrap';
import axios from 'axios';
import eventBus from './eventBus'; // Import event bus






// Získanie CSRF tokenu z meta tagu a jeho nastavenie ako predvolený header
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found');
}

axios.defaults.withCredentials = true;

// Import components
import FlashMessage from './components/FlashMessage.vue';
import Comment from './components/Comment.vue';

// Create Vue app instance
const app = createApp({});

// Register components
app.component('flash-message', FlashMessage);
app.component('comment', Comment);


// Poskytnite event bus globálne
app.config.globalProperties.$eventBus = eventBus;




// Mount the app
app.mount('#app');






