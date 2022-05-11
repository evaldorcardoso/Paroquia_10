import { initializeApp } from "firebase/app";

const firebaseConfig = {
    apiKey: "AIzaSyD3jX8MJVpo-U01g7IafuHwgO7pRB96uBA",
    authDomain: "paroquia-10.firebaseapp.com",
    databaseURL: "https://paroquia-10.firebaseio.com",
    projectId: "paroquia-10",
    storageBucket: "paroquia-10.appspot.com",
    messagingSenderId: "761038367071",
    appId: "1:761038367071:web:bfb2f50a4b501ed565eeea",
};

const auth = initializeApp(firebaseConfig);

export { auth };
