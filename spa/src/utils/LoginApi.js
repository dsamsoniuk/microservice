import axios from "axios"

export default class LoginApi {
    async refreshToken(username, password){

        try {
            const response = await axios.post('/api-login/api/login', { username: username, "password": password});

            sessionStorage.setItem('api_login_token', response.data.token);

            return true;
        } catch (error) {
            console.error('Błąd:', error);
        }
        return false
    }
    getTokenPayload(token){
        if (token) {
            return JSON.parse(atob(token.split('.')[1]));
        }
        return false
    }
    isTokenExpired(token) {
        try {
            const payload = this.getTokenPayload(token);
            const exp = payload.exp;
            const now = Math.floor(Date.now() / 1000);
            return exp < now;
        } catch (e) {
            return true; // token uszkodzony albo brak exp
        }
    }

    async get(url) {
        try {
            var token = sessionStorage.getItem('api_login_token');

            if (this.isTokenExpired(token)) {
                return false
            }

            const response = await axios.get(url, { 
                headers: { Authorization: `Bearer ${token}`  }
            });
            return response.data;
        } catch (error) {
            console.error('Błąd:', error);
        }
        return false
    }

}