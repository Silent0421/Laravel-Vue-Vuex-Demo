import Api from '../services/api';

class Ad {
    getAllAds() {
        return new Promise((resolve, reject) => {
            Api.call('/api/ads', 'get').then(res => {
                resolve(res.data);
            }, (x) => {
                reject(x.response.data)
            })
        })
    }

    getUserAds(id) {
        return new Promise((resolve, reject) => {
            Api.call('/api/ads/user/' + id, 'get').then(res => {
                resolve(res.data);
            }, (x) => {
                reject(x.response.data)
            })
        })
    }

    createAd(ad) {
        return new Promise((resolve, reject) => {
            Api.call('/api/ads', 'post', {}, ad).then(res => {
                resolve(res.data)
            }, (x) => {
                reject(x.response.data)
            })
        })
    }

    updateAd(ad) {
        return new Promise((resolve, reject) => {
            Api.call('/api/ads/' + ad.id, 'put', {}, ad).then(res => {
                resolve(res.data)
            }, (x) => {
                reject(x.response.data)
            })
        })
    }

    deleteAd(id) {
        return new Promise((resolve, reject) => {
            Api.call('/api/ads/' + id, 'delete').then(res => {
                resolve(res.data)
            }, (x) => {
                reject(x.response.data)
            })
        })
    }

    getCategories() {
        return new Promise((resolve, reject) => {
            Api.call('/api/ads/categories', 'get').then(res => {
                resolve(res.data)
            }, (x) => {
                reject(x.response.data)
            })
        })
    }

    getSubcategories(id) {
        return new Promise((resolve, reject) => {
            Api.call('/api/ads/subcategories/' + id, 'get').then(res => {
                resolve(res.data)
            }, (x) => {
                reject(x.response.data)
            })
        })
    }
}

export default new Ad;
