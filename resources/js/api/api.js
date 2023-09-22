import axios from 'axios';
// Default config for the axios instance
const axiosParams = {
// Set different base URL based on the environment
baseURL: '/',
// Alternative if you have more environments
// baseURL: process.env.VUE_APP_API_BASE_URL
};
// Create axios instance with default params
const axiosInstance = axios.create(axiosParams);
// Main api function
const api = (axios) => {
// Wrapper functions around axios
return {
get: (url, config) => axios.get(url, config),
post: (url, body, config) => axios.post(url, body, config),
put: (url, body, config) => axios.put(url, body, config),
patch: (url, body, config) => axios.patch(url, body, config),
delete: (url, config) => axios.delete(url, config),
};
};
// Initialise the api function and pass axiosInstance to it
export default api(axiosInstance);