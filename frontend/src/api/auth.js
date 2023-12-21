import axios from "axios";

export const authAPI = {
    setupCsrfToken() {
        axios.get(`${import.meta.env.VITE_BASE_URL}/sanctum/csrf-cookie`).then(() => {
            //
        });
    }
}