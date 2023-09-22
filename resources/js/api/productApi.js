import api from './api';
import { withAsync } from "./helpers/withAsync"
const URLS = {
    url: 'products',


};
export const fetchProducts = () => {
    return api.get(URLS.url, {});
};

export const addProducts = (data) => {
    return api.post(URLS.url, data, {});
};

export const deleteRecord = (id) => {
    return api.delete(URLS.url + "/" + id, {});
};
export const updateStatus = (data) => {
    return api.put(URLS.url + "/update-status", data, {});
};
