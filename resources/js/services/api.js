import Auth from './auth'

class Api {
    call(url, method, params = {}, data = {}, headers = {}) {
        headers = {'Authorization': Auth.getToken()};
        return window.axios({
            method,
            url,
            data,
            params,
            headers
        })
    }
}

export default new Api();
