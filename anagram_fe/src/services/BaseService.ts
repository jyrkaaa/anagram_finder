import axios, {AxiosInstance} from "axios";


export abstract class BaseService {
    protected axiosInstance: AxiosInstance;

    protected constructor() {
        this.axiosInstance
            = axios.create({
            baseURL: "http://13.51.160.33:8000/api/v1/", // server :http://16.170.239.187:8000/api/v1/
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        });


        this.axiosInstance.interceptors.response.use(
            (response) => {
                return response;
            },
        );
    }

}