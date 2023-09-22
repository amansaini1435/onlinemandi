import api from './api';
import { withAsync } from "./helpers/withAsync"
const URLS = {
    url: 'sellers',


};
export const fetchSellers = () => {
    return api.get(URLS.url, {});
};