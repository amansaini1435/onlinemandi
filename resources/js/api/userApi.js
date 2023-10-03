import api from './api';
import { withAsync } from "./helpers/withAsync"
const URLS = {
    url: '/users',


};
export const fetchUsers = () => {
    return api.get(URLS.url, {});
};
export const deleteRecord = (id) => {
    return api.delete(URLS.url + "/" + id, {});
};
export const updateStatus = (data) => {
    return api.put(URLS.url + "/update-status", data, {});
};
export const updateUser = (data) => {
    return api.put(`${URLS.url}/${data.id}`, data.values, {});
};
export const editUserData = async (UserId) => {
    return await api.get(`${URLS.url}/${UserId}`, {});
};
export const showUser = async (userId) => {
    return await api.get(`${URLS.url}/${userId}`, {});
};