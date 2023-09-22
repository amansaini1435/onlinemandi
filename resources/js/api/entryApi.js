import api from './api';
import { withAsync } from "./helpers/withAsync"
const URLS = {
    EntryUrl: 'entries',
};
export const fetchEntries = () => {
    return api.get(URLS.EntryUrl, {});
};