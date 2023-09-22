import api from './api';
const URLS = {
    logoutUrl: 'logout',
    fetchDogUrl: 'logout',
    fetchKittyUrl: 'breeds/image/random Fet',
};
export const logout = () => {
    return api.post(URLS.logoutUrl, {});
};
export const fetchDog = () => {
    return api.get(URLS.fetchDogUrl, {
        baseURL: 'https://dog.ceo/api/',
    });
};
export const fetchKitty = () => {
    return api.get(URLS.fetchKittyUrl, {
        baseURL: 'https://cataas.com/',
    });
};