import api from './api';
import { withAsync } from "./helpers/withAsync"
const URLS = {
    url: '/users',


};
export const fetchUsers = () => {
    return api.get(URLS.url, {});
};

export const addUser = (data) => {
    return api.post(URLS.url, data, {});
};

export const deleteRecord = (id) => {
    return api.delete(URLS.url + "/" + id, {});
};
export const updateStatus = (data) => {
    return api.put(URLS.url + "/update-status", data, {});
};
export const updateUser = (data) => {
    return api.put(`${URLS.ResourceUrl}/${data.id}`, data.values, {});
};