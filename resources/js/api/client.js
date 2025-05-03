import axios from 'axios';

const apiClient = axios.create({
  baseURL: import.meta.env.APP_URL || '/api',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
  },
});

export default apiClient;