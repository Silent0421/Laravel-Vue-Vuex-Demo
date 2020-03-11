import Api from './api'
import EventBus from './EventBus'
import jwt_decode from 'jwt-decode'
class Auth {
    constructor() {
        this.user = this.getUserFromStorage();
        EventBus.$on(['users:update', 'users.patch'], (user) => {
            if(user.id === this.getUser()?.id) {
                this.getUserFromApi().then(user =>{
                    this.setUser(user)
                })
            }
        })
    }

    getUserFromApi() {
        return new Promise((resolve, reject) => {
            Api.call('/api/auth/user', 'get').then(res => {
                resolve(res.data.user)
            },
                reject)
        })
    }

    getUserFromStorage() {
        return localStorage.getItem('User') ? JSON.parse(localStorage.getItem('User')) : false;
    }

    setUserToStorage(user) {
        return localStorage.setItem('User', JSON.stringify(user))
    }

    getUser() {
        return this.user ? this.user : this.getUserFromStorage();
    }

    setUser(user) {
        this.user = user;
        this.setUserToStorage(user);
        return this.user;
    }

    setToken(token) {
        localStorage.setItem('authorization', 'Bearer ' + token);
        return token;
    }

    getToken() {
        return localStorage.getItem('authorization')
    }

    login(email, password) {
        return new Promise((resolve, reject) => {
            window.axios.post('/api/auth/login', {'email':email, 'password': password
            }).then((res) => {
                this.loginRegisterStoreData(res);
                resolve(res.data.user);
            }, (x) => {
                reject(x.response.data);
            })
        })
    }

    register(name, email, password, confirmPassword) {
        return new Promise((resolve, reject) => {
            window.axios.post(
                '/api/auth/register',
                {
                    'name': name,
                    'email':email,
                    'password': password,
                    'password_confirmation': confirmPassword
                }).then((res) => {
                    this.loginRegisterStoreData(res);
                    resolve(res.data.user);
            }, (x) => {
                reject(x.response.data);
            })
        })
    }

    loginRegisterStoreData (res) {
        localStorage.clear();
        location.reload();
        this.setUser(res.data.user);
        this.setToken(res.headers.authorization);
        EventBus.$emit('login:success', res.data.user);
    }

    logout() {
        return new Promise((resolve, reject) => {
            Api.call('/api/auth/logout', 'post').then((res) => {
                localStorage.clear();
                location.reload();
                EventBus.$emit('logout:success', res.data.user);
                resolve(res.data)
            }, (x) => {
                reject(x.response.data);
            })
        })
    }

    check() {
        if (!!this.getUser()) {
            const decodedToken = jwt_decode(this.getToken().split("Bearer ")[1]);
            if (Date.now() > decodedToken.exp * 1000) {
                this.logout();
            }
        }
        return !!this.getUser();
    }
}

export default new Auth;
