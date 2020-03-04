import Auth from './auth'

class Api {
    call(url, method, params = {}, data = {}, headers = {}) {
        params.api_token = Auth.getUser().api_token;
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
