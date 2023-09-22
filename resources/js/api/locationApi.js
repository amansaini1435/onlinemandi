import api from './api';
import { withAsync } from "./helpers/withAsync"
const URLS = {
    LocationUrl: 'states',
};
export const fetchStates = () => {
    return api.get(URLS.LocationUrl, {});
};

export const fetchCities = (id) => {
    return api.get(URLS.LocationUrl + "/" + id, {});
};

export const addState = (data) => {
    return api.post(URLS.LocationUrl, data, {});
};


export const addCity = (data) => {
    return api.post(URLS.LocationUrl + "/add-city" , data, {});
};
export const deleteState = (id) => {
    return api.delete(URLS.LocationUrl + "/" + id, {});
};
export const updateStatus = (data) => {
    return api.put(URLS.LocationUrl + "/update-status", data, {});
};
