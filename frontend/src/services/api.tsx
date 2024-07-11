import axios from "axios";

export const baseURL = import.meta.env.VITE_API_URL;
export const baseURLType = import.meta.env.VITE_API_URLTYPE;

const api = axios.create({
  baseURL: baseURL, // Coloque a URL da sua APIbaseURLType aqui
  timeout: 10000, // Tempo limite da requisição em milissegundos
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

export { api };
